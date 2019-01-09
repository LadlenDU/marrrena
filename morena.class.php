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

    protected function ifElemCompletedByHref($href, $type)
    {
        if ($data = self::getStatusFileData()) {
            foreach ($data as &$item) {
                if ($item['href'] == $href) {
                    if (empty($item['status'])) {

                        //TODO: сомнительный код. Нет детей - статус положительный
                        if (empty($item['children'])) {
                            $item['status'] = true;
                            file_put_contents(self::STATUS_FILE, json_encode($data));
                            return true;
                        }

                        // Проверим, может все дочерние уже готовы
                        $completed = true;
                        foreach ($item['children'] as $child) {
                            if (!$this->ifElemCompletedByHref($child['href'])) {
                                $completed = false;
                                break;
                            }
                        }

                        if ($completed) {
                            $item['status'] = true;
                            file_put_contents(self::STATUS_FILE, json_encode($data));
                            return true;
                        }

                        return false;
                    }

                    return true;
                }
            }
        }

        return false;
    }

    protected function ifElemExistsByHref($href, $root = false)
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
    }

    protected function parseCategoryLabels()
    {
        $xpath = new DOMXPath($this->dom);
        $rootXPath = "//div[@id='rubricator-list']/ul/li";
        if ($brandsRoot = $xpath->query($rootXPath)) {
            foreach ($brandsRoot as $brand) {
                //$name = $xpath->query("./p/a", $brand)->item(0)->textContent;
                $elem = $xpath->query("./p/a", $brand)->item(0);
                if (!$this->ifElemExistsByHref($elem->getAttribute('href'))) {

                    $categoryName = trim($name = $xpath->query("./p/a", $brand)->item(0)->textContent);

                    $subCategoryList = $this->dr->getSublist($this->cid);
                    $elementCid = $this->dr->createSubelement($this->cid, $categoryName);

                    $this->statusFileContent[] = [
                        'name' => $categoryName,
                        'href' => trim($elem->getAttribute('href')),
                        'type' => 'category',
		                'children' => [],
		                'status' => true,
                    ];
                }
                /*if ($this->ifElemCompletedByHref($elem->getAttribute('href'), 'category')) {
                    continue;
                }*/
            }
        }
    }
}
