<?php

/**
 * Для генерации xlsx таблиц продуктов с сайта storeland.ru
 *
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

require_once 'ProductExcellGenerator.class.php';

/*$spreadsheet = new Spreadsheet();
//$spreadsheet->setActiveSheetIndex();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
$sheet->setTitle('MyTitle');

$newSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, 'NewTitle');
$newSheet->setCellValue('A2', '+++++++++++++');

$spreadsheet->addSheet($newSheet);

$writer = new Xlsx($spreadsheet);
$writer->save('hello_world.xlsx');
exit;*/

require_once 'DataReader.class.php';

$dirStructure = include 'dirStructure.php';
$titleScheme = include 'productsColumnScheme.php';

$importFile = false;

$firstCircle = true;
foreach ($titleScheme as $sheetName => $headerInfo) {
    if ($firstCircle) {
        $importFile = new ProductExcellGenerator($sheetName);
        $importFile->setSheetHeader($sheetName, $headerInfo);
        $firstCircle = false;
        continue;
    }

    $importFile->addSheet($sheetName);
    $importFile->setSheetHeader($sheetName, $headerInfo);
}

#$importFile->saveToFile('test.xlsx');
#exit;

function parseElems($elems, $parent_id = 0)
{
    global $importFile;

    foreach ($elems as $e) {
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

        //$csvArray = [];

        $file = fopen('data://text/plain,' . $csvRawUtf8, 'r');
        while (($line = fgetcsv($file, null, ';','"')) !== FALSE) {
            //$line is an array of the csv elements
            //$csvArray[] = $line;
            //setProductsPageLine($line);
            $importFile->addSheetRow('Products', $line);
        }
        fclose($file);

        /*$csvLines = explode("\n", $csvRawUtf8);

        foreach ($csvLines as $ln) {
            $csvArray[] = str_getcsv($ln, ';', '"', '"');
            //setProductsPage();
        }*/
        //exit;
        //print_r($csvArray);exit;
    }
}

parseElems($dirStructure['children']);

$importFile->saveToFile('test.xlsx');

/*$fp = fopen('file_prod.csv', 'w');

foreach ($csv as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);*/
