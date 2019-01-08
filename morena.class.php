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

        if ($contentJson = file_get_contents(self::STATUS_FILE)) {
            if ($contentArr = json_decode($contentJson, true)) {
                $status = self::getParseStatusOfNode($contentArr);
            } else {
                throw new \Exception('Не удалось декодировать JSON строку ' . $contentJson);
            }
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

        $dom = new DOMDocument;
        $dom->preserveWhiteSpace = false;
        $load = $dom->loadHTMLFile(self::URL);

        $this->parseMainLabels($load);
    }

    protected function parseMainLabels($html)
    {
        $xpath = new DOMXPath($this->dom);
        $rootXPath = "//div[@id='rubricator-list']/ul/li";
        if ($brandsRoot = $xpath->query($rootXPath)) {
            $sdf = 01;
        }
    }
}
