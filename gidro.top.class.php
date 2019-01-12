<?php

require_once 'QueryCreator.class.php';
require_once 'DataReader.class.php';
require_once 'functions.php';

class GidroTop
{
    const URL = 'https://gidro-top.ru';

    const STATUS_FILE = __DIR__ . '/parse.dirgo.top.status';

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
        $this->dr = new DataReader();
        $this->dr->login();

        $this->dom = new DOMDocument;
        $this->dom->preserveWhiteSpace = false;
        $this->dom->loadHTMLFile(self::URL);

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

        foreach ($elem as $hrefKey => $item) {
            if (trim($hrefKey) == $href) {
                $elementCid = $item['cid'];
                return isset($item['status']) ? $item['status'] : false;
            }

            if (!empty($item['children'])) {
                $result = $this->ifElemCompletedByHref($item['children'], $href, $elementCid);
                if ($result !== 'not_found') {
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
        $rootXPath = "//nav[contains(@class, 'catalog_body')]/ul/li/a";
        if ($categoryRoot = $this->xpath->query($rootXPath)) {

            //$subCategoryList = $this->dr->getSublist($this->cid);

            foreach ($categoryRoot as $category) {
                $categoryName = trim($category->textContent);

                $currHref = trim($category->getAttribute('href'));

                $href = trim($category->getAttribute('href'));

                if (!isset($this->statusFileContent[$currHref])) {
                    $elementCid = $this->dr->createSubelement($this->cid, $categoryName);
                    $this->statusFileContent[$href] = [
                        'name' => $categoryName,
                        //'href' => $href,
                        'cid' => $elementCid,
                        'type' => 'category',
                        'children' => [],
                        'status' => false,
                    ];
                    $this->saveStatusFileContent();
                } else {
                    $srchRes = $this->ifElemCompletedByHref($this->statusFileContent, $href, $elementCid);
                    if ($srchRes === 'not_found') {
                        throw new \Exception('HREF не найден: ' . $href);
                    }
                    if ($srchRes) {
                        continue;
                    }
                }

                $this->parseSubCategoryLabels($this->statusFileContent, $href, $elementCid);

            }

            $this->parseItems();
        }
    }

    protected function parseItems(&$category, $href)
    {
        $url = self::URL . $href;

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->loadHTMLFile($url);

        $xpath = new DOMXPath($dom);

        $urlList[] = $url;

        if ($lastPage = $xpath->query("//ul[contains(@class, 'pagination')]/li[last()]/preceding::li[1]")) {
            $hrefPage = trim($lastPage->getAttribute('href'));
            $hrefPage = explode('=', $hrefPage);
            if (count($hrefPage) != 2) {
                throw new \Exception('Неверный формат pagination-ссылки. URL: ' . $url);
            }
            $pages = (int)$hrefPage[1];
            for ($i = 2; $i <= $pages; ++$i) {
                $urlList[] = $hrefPage[0] . '=' . $i;
            }
        }

        foreach ($urlList as $l) {
            $this->getItemsFromAPage(&$category, $href);
        }


    }

    protected function getItemsFromAPage(&$category, $href)
    {
        $url = self::URL . $href;

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        $dom->loadHTMLFile($url);

        $xpath = new DOMXPath($dom);
        $itemsXp = $xpath->query("//div[contains(@class, 'product')]/div/form/div[@class='product_content']/div/a");

        $status = false;

        if ($itemsXp) {
            $status = true;
            foreach ($itemsXp as $itmXp) {
                if (!$itemHref = $itmXp->getAttribute('href')) {
                    throw new \Exception('Не удалось получить href одного из элементов по URL ' . $href);
                }

                if (empty($category['children'][$itemHref])
                    || empty($category['children'][$itemHref]['status'])
                ) {
                    $forName = '';
                    if (!$this->parseAnItem($category['cid'], $itemHref, $forName)) {
                        $status = false;
                        $category['children'][$itemHref] = [
                            'name' => $forName,
                            'href' => $itemHref,
                            //'cid' => $elementCid,
                            'type' => 'item',
                            'status' => false,
                        ];
                        //echo "Не удалось собрать инфо с $itemHref\n";
                    } else {
                        $category['children'][$itemHref] = [
                            'name' => $forName,
                            'href' => $itemHref,
                            //'cid' => $elementCid,
                            'type' => 'item',
                            'status' => true,
                        ];
                    }

                    $this->saveStatusFileContent();
                }
            }
        }

        return $status;
    }

    protected function handleSubcategory(&$subcategory)
    {
        $allParsed = true;

        if (empty($subcategory['status'])) {
            if (empty($subcategory['children'])) {
                // Парсятся subcategory
                $allParsed = $this->parseItemsPage($subcategory);
                if ($allParsed) {
                    $subcategory['status'] = true;
                    $this->saveStatusFileContent();
                }
            } else {
                // Парсятся sublink
                foreach ($subcategory['children'] as &$child) {
                    //if (!$this->parseItemsPage($child['cid'], $child['href'])) {
                    if ($this->parseItemsPage($child)) {
                        $child['status'] = true;
                        $this->saveStatusFileContent();
                    } else {
                        $allParsed = false;
                    }
                }
            }

            /*if ($allParsed) {
                $subcategory['status'] = true;
                $this->saveStatusFileContent();
            }*/
        }

        return $allParsed;
    }

    /**
     * @param $xpath DOMXPath
     */
    protected function getPaginationUrls($xpath)
    {
        $urls = [];

        $lastPg = false;

        $pagins = $xpath->query("//font[@class='text']/a");
        foreach ($pagins as $pg) {
            $lastPg = $pg;
            if (is_numeric(trim($pg->nodeValue))) {
                $urls[] = trim($pg->getAttribute('href'));
            }
        }

        if ($urls) {
            if (!$lastPagingUrl = trim($lastPg->getAttribute('href'))) {
                throw new \Exception('Найден педжинатор но не найден URL конца. URL: ' . $xpath->document->baseURI);
            }

            $lastPageNumber = self::getPageNumberFromPagingUrl(end($urls), $xpath);
            $lastPageNumberReal = self::getPageNumberFromPagingUrl($lastPagingUrl, $xpath);

            while ($lastPageNumberReal > $lastPageNumber) {
                $parts = explode('=', $lastPagingUrl);
                ++$lastPageNumber;
                unset($parts[count($parts) - 1]);

                $urls[] = implode('=', $parts) . '=' . $lastPageNumber;
            }
        }

        return $urls;
    }

    protected static function getPageNumberFromPagingUrl($url, $xpath)
    {
        $partsOfLastUrl = explode('=', $url);
        if (count($partsOfLastUrl) < 2) {
            throw new \Exception('Не найдено =. URL: ' . $xpath->document->baseURI);
        }
        $lastPageNumber = trim(end($partsOfLastUrl));
        if (!is_numeric($lastPageNumber)) {
            throw new \Exception('Последнее значение URL не число. URL: ' . $xpath->document->baseURI . '; $pagingUrl: ' . $url);
        }

        return (int)$lastPageNumber;
    }

    protected function parseItemsPage(&$node)
    {
        $status = false;

        $url = self::URL . $node['href'];

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        if (!$dom->loadHTMLFile($url)) {
            throw new \Exception('Не удалось загрузить URL ' . $url);
        }
        $xpath = new DOMXPath($dom);

        $paginUrls = $this->getPaginationUrls($xpath);
        $paginCounter = 0;

        for (; ;) {

            if ($paginCounter > 0) {
                $dom = new DOMDocument;
                $dom->preserveWhiteSpace = false;
                if (!$dom->loadHTMLFile(self::URL . $paginUrls[$paginCounter - 1])) {
                    throw new \Exception('Не удалось загрузить URL ' . $url);
                }
                $xpath = new DOMXPath($dom);
            }

            $items = "//div[contains(@class, 'bx_catalog_list_home')]/div/div[contains(@class, 'bx_catalog_item_container')]/div[contains(@class, 'bx_catalog_item_title')]/a";
            $itemsXp = $xpath->query($items);

            if ($itemsXp) {
                $status = true;
                foreach ($itemsXp as $itmXp) {
                    if (!$itemHref = $itmXp->getAttribute('href')) {
                        throw new \Exception('Не удалось получить href одного из элементов по URL ' . $url);
                    }

                    if (empty($node['children'][$itemHref])) {
                        if (!$this->parseAnItem($node['cid'], $itemHref)) {
                            $status = false;
                            $node['children'][$itemHref] = [
                                //'name' => $prod['name'],
                                'href' => $itemHref,
                                //'cid' => $elementCid,
                                'type' => 'item',
                                'status' => false,
                            ];
                        } else {
                            $node['children'][$itemHref] = [
                                //'name' => $prod['name'],
                                'href' => $itemHref,
                                //'cid' => $elementCid,
                                'type' => 'item',
                                'status' => true,
                            ];
                        }

                        $this->saveStatusFileContent();
                    }
                }
            }

            if (count($paginUrls) > $paginCounter) {
                ++$paginCounter;
                continue;
            }

            break;
        }

        return $status;
    }

    protected function parseAnItem($cid, $href, &$forName)
    {
        $url = self::URL . $href;

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        if (!$dom->loadHTMLFile($url)) {
            throw new \Exception('Не удалось загрузить URL ' . $url);
        }

        /*$prodExample = [
            'img_src' => '',
            'name' => '',
            'short_description' => '',
            'full_description' => '',
            'price' => '',
            'vendor_code' => '',
            'features' => [
                'name' => '',
                'value' => '',
            ],
        ];*/

        $prod = [];

        $xpath = new DOMXPath($dom);

        if ($imgXp = $xpath->query("//span[contains(@class, 'bx_bigimages_aligner')]/img")) {
            if ($imgXp = $imgXp->item(0)) {
                $prod['img_src'] = trim($imgXp->getAttribute('src'));
            }
        }

        if ($nameXp = $xpath->query("//div[contains(@class, 'content-part')]/h1")) {
            if ($nameXp = $nameXp->item(0)) {
                $prod['name'] = trim($nameXp->nodeValue);
            }
        }

        if ($descrXp = $xpath->query("//div[contains(@id, 'tab1')]")) {
            if ($descrXp = $descrXp->item(0)) {
                $prod['short_description'] = trim($descrXp->nodeValue);
                //$prod['full_description'] = $prod['short_description'] ;
                //TODO: разобраться
                $prod['full_description'] = $descrXp ? $descrXp->ownerDocument->saveHTML($descrXp) : '';
            }
        }

        if ($priceXp = $xpath->query("//div[contains(@class, 'item_current_price')]")) {
            if ($priceXp = $priceXp->item(0)) {
                $prod['price'] = trim($priceXp->nodeValue);
                $prod['price'] = str_replace('руб.', '', $prod['price']);
                $prod['price'] = str_replace('руб', '', $prod['price']);
                $prod['price'] = str_replace('р.', '', $prod['price']);
                $prod['price'] = str_replace('р', '', $prod['price']);
            }
        }

        $prod['features'] = [];
        if ($featXp = $xpath->query("//div[contains(@id, 'tab6')]/dl/*")) {
            foreach ($featXp as $ft) {
                if ($ft->tagName == 'dt') {
                    $newFeature['name'] = trim($ft->nodeValue);
                } elseif ($ft->tagName == 'dd') {
                    $newFeature['value'] = trim($ft->nodeValue);

                    if (isset($newFeature['name'])) {
                        $upperName = mb_strtoupper($newFeature['name'], 'utf-8');
                        if ($upperName == 'АРТИКУЛ ПРОИЗВОДИТЕЛЯ') {
                            $prod['vendor_code'] = $newFeature['value'];
                        }
                    }

                    $prod['features'][] = $newFeature;
                    $newFeature = [];
                }
            }
        }

        if (!isset($prod['vendor_code'])) {
            $prod['vendor_code'] = '';
        }

        $result = putProduct($prod, self::URL, $cid, $this->percentAddPrice, $newItems, $oldItems, $wrongItems, $this->searchType);

        return $result;
    }

    public static function setError($msg)
    {
        mail('TwilightTower@mail.ru', 'Ошибка в парсере', $msg);
    }

    public static function cleanSpaces($str)
    {
        $str = trim($str);
        $str = preg_replace('/(\r)|(\n)/', '', $str);
        $str = preg_replace('/\s+/', ' ', $str);
        return $str;
    }

    protected function parseSubCategoryLabels(&$category, $hrefParent, $cidParent)
    {
        $url = self::URL . $hrefParent;

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        if (!$dom->loadHTMLFile($url)) {
            throw new \Exception('Не удалось загрузить URL ' . $url);
        }

        $xpath = new DOMXPath($dom);

        $subCategs = $xpath->query("//a[@class='sub-category-link']");
        if (!$subCategs) {
            //throw new \Exception('Не найдены субкатегории. Href: ' . $hrefParent . '; cidParent: ' . $cidParent);
            echo "Время парсить товары. URL: $hrefParent <br>";
            $this->parseItems($category, $hrefParent);
            return;
        }
        foreach ($subCategs as $cated) {
            //TODO: можно добавлять изображения категорий - как???
            $subCatHref = trim($cated->getAttribute('href'));
            $subCatName = self::cleanSpaces($cated->getAttribute('title'));

            if (empty($hrefParent)) {
                $stopper = 1;
            }

            if (!isset($category['children'][$subCatHref])) {
                $elementCid = $this->dr->createSubelement($cidParent, $subCatName);
                $category['children'][$subCatHref] = [
                    'name' => $subCatName,
                    //'href' => $subCatHref,
                    'cid' => $elementCid,
                    'type' => 'subcategory',
                    'children' => [],
                    'status' => false,
                ];
                $this->saveStatusFileContent();
            } else {
                $elementCid = $category['children'][$subCatHref]['cid'];
            }

            if (empty($category['children'][$subCatHref]['status'])) {
                $srchRes = $this->ifElemCompletedByHref($category['children'], $subCatHref, $elementCid);
                if ($srchRes === 'not_found') {
                    throw new \Exception('HREF не найден: ' . $subCatHref);
                }
                if ($srchRes) {
                    $category['children'][$subCatHref]['status'] = true;
                    $this->saveStatusFileContent();
                } else {
                    $this->parseSubCategoryLabels($category['children'][$subCatHref], $subCatHref, $elementCid);
                }
            }
        }
    }

    protected function parseSubCategory_1_Labels($hrefParent, $cidParent)
    {
        $url = self::URL . $hrefParent;

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        if (!$dom->loadHTMLFile($url)) {
            throw new \Exception('Не удалось загрузить URL ' . $url);
        }

        $xpath = new DOMXPath($dom);

        $subCategs = $xpath->query("//div[@class='sub-category-link']");
        if (!$subCategs) {
            throw new \Exception('Не найдены субкатегории. Href: ' . $hrefParent . '; cidParent: ' . $cidParent);
        }
        foreach ($subCategs as $cated) {
            //TODO: можно добавлять изображения категорий - как???
            $subCatHref = trim($cated->getAttribute('href'));
            $subCatName = self::cleanSpaces($cated->getAttribute('title'));

            if (empty($hrefParent)) {
                $stopper = 1;
            }

            if (!isset($this->statusFileContent[$hrefParent]['children'][$subCatHref])) {
                $elementCid = $this->dr->createSubelement($cidParent, $subCatName);
                $this->statusFileContent[$hrefParent]['children'][$subCatHref] = [
                    'name' => $subCatName,
                    //'href' => $subCatHref,
                    'cid' => $elementCid,
                    'type' => 'subcategory_1',
                    'children' => [],
                    'status' => false,
                ];
                $this->saveStatusFileContent();
            } else {
                $elementCid = $this->statusFileContent[$hrefParent]['children'][$subCatHref]['cid'];
            }

            if (empty($this->statusFileContent[$hrefParent]['children'][$subCatHref]['status'])) {
                $srchRes = $this->ifElemCompletedByHref($this->statusFileContent[$hrefParent]['children'], $subCatHref, $elementCid);
                if ($srchRes === 'not_found') {
                    throw new \Exception('HREF не найден: ' . $subCatHref);
                }
                if ($srchRes) {
                    $this->statusFileContent[$hrefParent]['children'][$subCatHref]['status'] = true;
                    $this->saveStatusFileContent();
                } else {
                    $this->parseSubCategory_2_Labels($this->statusFileContent[$hrefParent]['children'][$subCatHref]['children'], $subCatHref, $elementCid);
                }
            }
        }
    }

    protected function parseSubCategory_2_Labels(&$storeArr, $href, $cidParent)
    {

    }
}
