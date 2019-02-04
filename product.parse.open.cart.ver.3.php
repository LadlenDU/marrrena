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

        $firstCycle = true;

        $file = fopen('data://text/plain,' . $csvRawUtf8, 'r');
        while (($line = fgetcsv($file, null, ';', '"')) !== FALSE) {
            if ($firstCycle) {
                $firstCycle = false;
                continue;
            }
            //$line is an array of the csv elements
            //$csvArray[] = $line;
            setProductsPageLine($line, $e['attributes']['id']);
            //$importFile->addSheetRow('Products', $line);
        }
        fclose($file);
        $importFile->saveToFile('test.xlsx');
        exit;

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

function setProductsPageLine($line, $categoryId)
{
    global $importFile;

    static $currentProductId = 1;

    $dateAdded = generateProductDateAdded();

    if (!isset($line[10])) {
        $stopper = 1;
    }

    $line = array_map('trim', $line);

    $imageName = $line[10] ? trim(explode("\n", $line[10])[0]) : '';

    $importLine = [
        'product_id' => $currentProductId++,
        'name(en-gb)' => $line[0],
        'categories' => $categoryId,
        'sku' => $line[4],  // Артикул ???
        'upc' => '',
        'ean' => '',
        'jan' => '',
        'isbn' => '',
        'mpn' => '',
        'location' => '',       //TODO проверить (из свойств)
        'quantity' => 1,
        'model' => '',          //TODO (из свойств)
        'manufacturer' => '',   //TODO (из свойств)
        'image_name' => $imageName,
        'shipping' => 'yes',    // подтвердил Ventfabrika
        'price' => formatRawDecimal($line[5]),
        'points' => 0,          //TODO: wtf?
        'date_added' => $dateAdded,
        'date_modified' => $dateAdded,
        'date_available' => substr($dateAdded, 0, 10),
        'weight' => 0,          //TODO (из свойств)
        'weight_unit' => 'kg',  //TODO (из свойств)
        'length' => 0,          //TODO (из свойств)
        'width' => 0,           //TODO (из свойств)
        'height' => 0,          //TODO (из свойств)
        'length_unit' => 'cm',  //TODO (из свойств)
        'status' => 'true',
        'tax_class_id' => 9,    //TODO: также может быть 100 - wtf
        'description(en-gb)' => $line[2],   // полное описание товара (подумать куда девать короткое($line[1]) если надо)
        'meta_title(en-gb)' => $line[0],    //TODO: обдумать правильно ли это
        'meta_description(en-gb)' => $line[1],  //TODO: обдумать правильно ли это (это короткое описание)
        'meta_keywords(en-gb)' => '',
        'stock_status_id' => 5,     //TODO: wtf (известные значения - 5,6,7,8)
        'store_ids' => 0,           //???
        'layout' => '',
        'related_ids' => '',        //TODO: в идеале можно реализовать но пока слишком сложно
        'tags(en-gb)' => '',
        'sort_order' => 0,
        'subtract' => 'true',       //wft?
        'minimum' => 1,             //wft?
    ];

    $importFile->addSheetRow('Products', $importLine);
}

function formatRawDecimal($rawDecimal)
{
    return str_replace([' ', ','], ['', '.'], $rawDecimal);
}

function generateProductDateAdded()
{
    $month = str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT);
    $day = str_pad(rand(1, 27), 2, '0', STR_PAD_LEFT);
    $hour = str_pad(rand(0, 23), 2, '0', STR_PAD_LEFT);
    $minute = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
    $sec = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);

    return date('201' . rand(7, 8) . "-$month-$day $hour:$minute:$sec");
}

/*$fp = fopen('file_prod.csv', 'w');

foreach ($csv as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);*/
