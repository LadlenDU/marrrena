<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require_once 'DataReader.class.php';

$dirStructure = include 'dirStructure.php';

$csv[] = [
    'product_id',
    'name(en-gb)',
    'name(ru-ru)',
    'categories',
    'sku',
    'upc',
    'ean',
    'jan',
    'isbn',
    'mpn',
    'location',
    'quantity',
    'model',
    'manufacturer',
    'image_name',
    'shipping',
    'price',
    'points',
    'date_added',
    'date_modified',
    'date_available',
    'weight',
    'weight_unit',
    'length',
    'width',
    'height',
    'length_unit',
    'status',
    'tax_class_id',
    'seo_keyword',
    'description(en-gb)',
    'description(ru-ru)',
    'meta_title(en-gb)',
    'meta_title(ru-ru)',
    'meta_description(en-gb)',
    'meta_description(ru-ru)',
    'meta_keywords(en-gb)',
    'meta_keywords(ru-ru)',
    'stock_status_id',
    'store_ids',
    'layout',
    'related_ids',
    'tags(en-gb)',
    'tags(ru-ru)',
    'sort_order',
    'subtract',
    'minimum',
];

function parseElems($elems, $parent_id = 0)
{
    global $csv;

    //static $categId = 1;

    foreach ($elems as $e) {
        //https://x218025.storeland.ru/admin/store_goods_export/cid_5409469
        if (!empty($e['children'])) {
            parseElems($e['children'], $e['attributes']['id']);
            continue;
        }

        $dr = new DataReader();
        $dr->login();

        $url = 'https://x218025.storeland.ru/admin/store_goods_export/' . urlencode('cid_' . $e['attributes']['id']);

        $csvRaw = $dr->getPage($url);
        //file_put_contents('ttttt.csv', $csvRaw);exit;

        $csvRawUtf8 = mb_convert_encoding($csvRaw, 'utf-8', 'windows-1251');

        $csvLines = explode("\n", $csvRawUtf8);
        $csvArray = [];
        foreach ($csvLines as $ln) {
            $csvArray[] = str_getcsv($ln, ';');
        }
        //print_r($csvArray);


        $csv[] = [
            '' => '', //'product_id',
            '' => '', //'name(en-gb)',
            '' => '', //'name(ru-ru)',
            '' => '', //'categories',
            '' => '', //'sku',
            '' => '', //'upc',
            '' => '', //'ean',
            '' => '', //'jan',
            '' => '', //'isbn',
            '' => '', //'mpn',
            '' => '', //'location',
            '' => '', //'quantity',
            '' => '', //'model',
            '' => '', //'manufacturer',
            '' => '', //'image_name',
            '' => '', //'shipping',
            '' => '', //'price',
            '' => '', //'points',
            '' => '', //'date_added',
            '' => '', //'date_modified',
            '' => '', //'date_available',
            '' => '', //'weight',
            '' => '', //'weight_unit',
            '' => '', //'length',
            '' => '', //'width',
            '' => '', //'height',
            '' => '', //'length_unit',
            '' => '', //'status',
            '' => '', //'tax_class_id',
            '' => '', //'seo_keyword',
            '' => '', //'description(en-gb)',
            '' => '', //'description(ru-ru)',
            '' => '', //'meta_title(en-gb)',
            '' => '', //'meta_title(ru-ru)',
            '' => '', //'meta_description(en-gb)',
            '' => '', //'meta_description(ru-ru)',
            '' => '', //'meta_keywords(en-gb)',
            '' => '', //'meta_keywords(ru-ru)',
            '' => '', //'stock_status_id',
            '' => '', //'store_ids',
            '' => '', //'layout',
            '' => '', //'related_ids',
            '' => '', //'tags(en-gb)',
            '' => '', //'tags(ru-ru)',
            '' => '', //'sort_order',
            '' => '', //'subtract',
            '' => '', //'minimum',
        ];
    }
}

parseElems($dirStructure['children']);

$fp = fopen('file_prod.csv', 'w');

foreach ($csv as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
