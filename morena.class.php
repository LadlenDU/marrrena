<?php

class Morena
{
    const URL = 'https://morena.ru';

    const STATUS_FILE = __DIR__ . '/parse.status';

    public $cid;
    public $reportEmail;
    public $searchType;
    public $percentAddPrice;

    protected $dom;

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
    }

    public static function getParseStatusOfNode($node)
    {
        $success = true;
        foreach ($node as $item) {
            if (empty($item['status'])) {
                $success = false;
                break;
            }
        }
        return $success;
    }

    public static function getParseStatus()
    {
        $status = false;

        /*if ($contentJson = file_get_contents(self::STATUS_FILE)) {
            if ($contentArr = json_decode($contentJson, true)) {
                $status = self::getParseStatusOfNode($contentArr);
            } else {
                throw new \Exception('Не удалось декодировать JSON строку ' . $contentJson);
            }
        }*/

        if ($contentArr = self::getStatusFileData()) {
            $status = self::getParseStatusOfNode($contentArr);
        }

        return $status;
    }

    public function parse()
    {
        if (self::getParseStatus()) {
            throw new \Exception('Парсинг завершен. Чтобы перепарсить удалите файл ' . self::STATUS_FILE);
        }

        //$dr = new DataReader();
        //$dr->login();
        //$brandList = $dr->getSublist($this->cid);

        $this->dom = new DOMDocument;
        $this->dom->preserveWhiteSpace = false;
        $load = $this->dom->loadHTMLFile(self::URL);

        $this->parseMainLabels($load);
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

    protected function ifElemCompletedByHref($href)
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

    protected function parseMainLabels()
    {
        $xpath = new DOMXPath($this->dom);
        $rootXPath = "//div[@id='rubricator-list']/ul/li";
        if ($brandsRoot = $xpath->query($rootXPath)) {
            foreach ($brandsRoot as $brand) {
                //$name = $xpath->query("./p/a", $brand)->item(0)->textContent;
                $elem = $xpath->query("./p/a", $brand)->item(0);
                if ($this->ifElemCompletedByHref($elem->getAttribute('href'))) {
                    continue;
                }
            }
        }
    }
}
