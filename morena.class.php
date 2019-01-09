<?php

require_once 'DataReader.class.php';

class Morena
{
    const URL = 'https://morena.ru';

    const STATUS_FILE = __DIR__ . '/parse.status';

    public $cid;
    public $reportEmail;
    public $searchType;
    public $percentAddPrice;

    protected $dom;

    /** @var DOMXPath */
    protected $xpath;

    /** @var  DataReader */
    protected $dr;

    /** @var array содержимое STATUS_FILE */
    protected $statusFileContent = [];

    /**
     * Morena constructor.
     * @param $cid string ID категории
     * @param $reportEmail string
     * @param $searchType string
     * @param $percentAddPrice string сколько % добавить или отнять из цены
     */
    public function __construct($cid, $reportEmail, $searchType, $percentAddPrice)
    {
        $this->cid = $cid;
        $this->reportEmail = $reportEmail;
        $this->searchType = $searchType;
        $this->percentAddPrice = $percentAddPrice;

        $this->getStatusFileContent();
    }

    protected function getStatusFileContent()
    {
        if (($contentJson = file_get_contents(self::STATUS_FILE)) === false) {
            throw new \Exception('Не удалось прочитать содержимое файла ' . self::STATUS_FILE);
        }

        if (!$contentJson) {
            file_put_contents(self::STATUS_FILE, '[]');
            $this->statusFileContent = [];
            return;
        }

        if (($contentArr = json_decode($contentJson, true)) === null) {
            throw new \Exception('Не удалось декодировать JSON строку ' . $contentJson);
        }

        $this->statusFileContent = $contentArr;
    }

    protected function saveStatusFileContent()
    {
         if (($encoded = json_encode($this->statusFileContent)) === false) {
             throw new \Exception('json_encode() не закодировало массив: ' . print_r($this->statusFileContent, true));
         }

        if (file_put_contents(self::STATUS_FILE, $encoded) === false) {
            throw new \Exception('Не удалось сохранить JSON строку в файл статуса: ' . $encoded);
        }
    }

    /*public static function getParseStatusOfNode($node)
    {
        $success = true;
        foreach ($node as $item) {
            if (empty($item['status'])) {
                $success = false;
                break;
            }
        }
        return $success;
    }*/

    /*public static function getParseStatus()
    {
        $status = false;

        if ($contentArr = self::getStatusFileData()) {
            $status = self::getParseStatusOfNode($contentArr);
        }

        return $status;
    }*/

    public function parse()
    {
        /*if (self::getParseStatus()) {
            throw new \Exception('Парсинг завершен. Чтобы перепарсить удалите файл ' . self::STATUS_FILE);
        }*/

        $this->dr = new DataReader();
        $this->dr->login();
        //$categoryList = $dr->getSublist($this->cid);

        $this->dom = new DOMDocument;
        $this->dom->preserveWhiteSpace = false;
        $load = $this->dom->loadHTMLFile(self::URL);

        $this->parseCategoryLabels();
    }

    protected function getStatusFileData()
    {
        $data = false;

        if ($contentJson = file_get_contents(self::STATUS_FILE)) {
            if (!$data = json_decode($contentJson, true)) {
                throw new \Exception('Не удалось декодировать JSON строку ' . $contentJson);
            }
        }

        return $data;
    }

    protected function ifElemCompletedByHref($elem, $href, &$elementCid)
    {
        $href = trim($href);

        foreach ($elem as $item) {
            if (!isset($item['href'])) {
                $stopper = 1;
            }
            if (trim($item['href']) == $href) {
                $elementCid = $item['cid'];
                return isset($item['status']) ? $item['status'] : false;
            }

            if (!empty($item['children'])) {
                $result = $this->ifElemCompletedByHref($item['children'], $href, $elementCid);
                if ($result != 'not_found') {
                    return isset($result['status']) ? $result['status'] : false;
                }
            }
        }

        return 'not_found';
    }

    /*protected function ifElemExistsByHref($href, $root = false)
    {
        if ($root == false) {
            $root = $this->statusFileContent;
        }

        $href = trim($href);
        foreach ($root as $elem) {
            if ($elem['href'] == $href) {
                return true;
            }
            if (!empty($elem['children'])) {
                if ($this->ifElemExistsByHref($href, $elem['children'])) {
                    return true;
                }
            }
        }

        return false;
    }*/

    protected function parseCategoryLabels()
    {
        $this->xpath = new DOMXPath($this->dom);
        $rootXPath = "//div[@id='rubricator-list']/ul/li";
        if ($categoryRoot = $this->xpath->query($rootXPath)) {

            $subCategoryList = $this->dr->getSublist($this->cid);

            foreach ($categoryRoot as $category) {
                $elem = $this->xpath->query("./p/a", $category)->item(0);

                $categoryName = trim($this->xpath->query("./p/a", $category)->item(0)->textContent);

                //$subCategoryList = $this->dr->getSublist($this->cid);

                $subcategoryExists = false;
                foreach ($this->statusFileContent as $sfc) {
                    if (isset($subCategoryList[$sfc['cid']])) {
                        $subcategoryExists = true;
                        break;
                    }
                }

                $href = trim($elem->getAttribute('href'));

                if (!$subcategoryExists) {
                    $elementCid = $this->dr->createSubelement($this->cid, $categoryName);
                    $this->statusFileContent[$href] = [
                        'name' => $categoryName,
                        'href' => $href,
                        'cid' => $elementCid,
                        'type' => 'category',
                        'children' => [],
                        'status' => false,
                    ];
                    $this->saveStatusFileContent();
                } else {
                    $srchRes = $this->ifElemCompletedByHref($this->statusFileContent, $href, $elementCid);
                    if ($srchRes == 'not_found') {
                        throw new \Exception('HREF не найден: ' . $href);
                    }
                    if ($srchRes) {
                        continue;
                    }
                }

                $this->parseSubCategoryLabels($category, $href, $elementCid);

                /*if (!$this->ifElemExistsByHref($elem->getAttribute('href'))) {
                    $this->statusFileContent[] = [
                        'name' => $categoryName,
                        'href' => trim($elem->getAttribute('href')),
                        'cid' => $elementCid,
                        'type' => 'category',
		                'children' => [],
		                'status' => false,
                    ];
                    $this->saveStatusFileContent();
                }*/
                /*if ($this->ifElemCompletedByHref($elem->getAttribute('href'), 'category')) {
                    continue;
                }*/
            }
        }
    }

    public static function cleanSpaces($str)
    {
        $str = trim($str);
        $str = preg_replace('/(\r)|(\n)/', '', $str);
        $str = preg_replace('/\s+/', ' ', $str);
        return $str;
    }

    protected function parseSubCategoryLabels($category, $hrefParent, $cidParent)
    {
        $subcatForChildren = false;

        $subCategs = $this->xpath->query("./div[contains(@class, 'dmenu')]/p/a", $category);
        foreach ($subCategs as $cated) {
            $subCatHref = trim($cated->getAttribute('href'));
            $subCatName = self::cleanSpaces($cated->textContent);
            $ifSublink = ($cated->getAttribute('class') == 'sublink');

            if (empty($hrefParent)) {
                $stopper = 1;
            }
            if (
                ($ifSublink && !isset($this->statusFileContent[$hrefParent]['children'][$subcatForChildren['href']]['children'][$subCatHref]))
                || (!$ifSublink && !isset($this->statusFileContent[$hrefParent]['children'][$subCatHref]))
            ) {
            //if (!isset($this->statusFileContent[$hrefParent]['children'][$subCatHref])) {
                if ($ifSublink) {
                    $elementCid = $this->dr->createSubelement($subcatForChildren['cid'], $subCatName);
                    if (empty($subcatForChildren['href']) || empty($hrefParent)) {
                        $stopper = 1;
                    }
                    $this->statusFileContent[$hrefParent]['children'][$subcatForChildren['href']]['children'][$subCatHref] = [
                        'name' => $subCatName,
                        'href' => $subCatHref,
                        'cid' => $subcatForChildren['cid'],
                        'type' => 'sublink',
                        'status' => false,
                    ];
                } else {
                    $elementCid = $this->dr->createSubelement($cidParent, $subCatName);
                    $subcatForChildren = [
                        'href' => $subCatHref,
                        'cid' => $elementCid,
                    ];
                    if (empty($hrefParent)) {
                        $stopper = 1;
                    }
                    $this->statusFileContent[$hrefParent]['children'][$subCatHref] = [
                        'name' => $subCatName,
                        'href' => $subCatHref,
                        'cid' => $elementCid,
                        'type' => 'subcategory',
                        //'children' => [],
                        'status' => false,
                    ];
                }
                $this->saveStatusFileContent();
            } else {
                if (empty($hrefParent)) {
                    $stopper = 1;
                }
                $srchRes = $this->ifElemCompletedByHref($this->statusFileContent[$hrefParent]['children'], $subCatHref, $elementCid);
                if ($srchRes == 'not_found') {
                    throw new \Exception('HREF не найден: ' . $subCatHref);
                }
                if (!$ifSublink) {
                    $subcatForChildren = [
                        'href' => $subCatHref,
                        'cid' => $elementCid,
                    ];
                }
                if ($srchRes) {
                    continue;
                }
            }

            /*if ($this->statusFileContent[$hrefParent]['children'][$subCatHref]) {

            }*/
        }
    }
}
