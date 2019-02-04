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

        $csvRawUtf8 = mb_convert_encoding($csvRaw, 'utf-8', 'windows-1251');

        $firstCycle = true;

        $file = fopen('data://text/plain,' . $csvRawUtf8, 'r');
        while (($line = fgetcsv($file, null, ';', '"')) !== FALSE) {
            if ($firstCycle) {
                $firstCycle = false;
                continue;
            }

            $line = array_map('trim', $line);

            $productId = setProductsPageLine($line, $e['attributes']['id']);
            setAdditionalImagesPageLine($line, $productId);
            //setSpecialsPageLine($line);   // скидки
            //setDiscountsPageLine($line);
            //setRewardsPageLine($line);
            //setProductOptionsPageLine($line, $productId);
            //setProductOptionsValuesPageLine($line, $productId);
            setProductAttributesPageLine($line, $productId);
            //setProductFiltersPageLine($line, $productId);
            setProductSEOKeywordsPageLine($line, $productId);
        }
        fclose($file);
        $importFile->saveToFile('test.xlsx');
        exit;
    }
}

parseElems($dirStructure['children']);

$importFile->saveToFile('test.xlsx');

function setProductSEOKeywordsPageLine($line, $productId)
{
    global $importFile;

    $importLine = [
        'product_id' => $productId,
        'store_id' => 0,                // wtf?
        'keyword(en-gb)' => $line[16],  //TODO: похоже подходит, но может быть не совсем верно
    ];

    $importFile->addSheetRow('ProductSEOKeywords', $importLine);
}

function setProductAttributesPageLine($line, $productId)
{
    global $importFile;

    $lineLength = count($line);
    for ($i = 20; $i < $lineLength; $i += 2) {
        $attribute = $line[$i];
        $text = $line[$i + 1];
        $importLine = [
            'product_id' => $productId,
            'attribute_group' => 'Общая',
            'attribute' => $attribute,
            'text(en-gb)' => $text,
        ];
        $importFile->addSheetRow('ProductAttributes', $importLine);
    }
}

function setAdditionalImagesPageLine($line, $productId)
{
    global $importFile;

    $images = explode("\n", $line[10]);
    if (count($images) < 2) {
        return;
    }

    unset($images[0]);
    $images = array_map('trim', $images);

    foreach ($images as $img) {
        $imageName = prepareImageGetPath($img);

        $importLine = [
            'product_id' => $productId,
            'image' => $imageName,
            'sort_order' => 0,
        ];

        $importFile->addSheetRow('AdditionalImages', $importLine);
    }
}

function setProductsPageLine($line, $categoryId)
{
    global $importFile;

    static $currentProductId = 1;

    $dateAdded = generateProductDateAdded();

    if (!isset($line[10])) {
        $stopper = 1;
    }

    $imageName = prepareImageGetPath($line[10] ? trim(explode("\n", $line[10])[0]) : '');

    if (!$weightUnit = getProductAttribute($line, 'weight', true)) {
        $weightUnit = 'kg';
    }

    $importLine = [
        'product_id' => $currentProductId,
        'name(en-gb)' => $line[0],
        'categories' => $categoryId,
        'sku' => $line[4],  // Артикул ???
        'upc' => '',
        'ean' => '',
        'jan' => '',
        'isbn' => '',
        'mpn' => '',
        'location' => getProductAttribute($line, 'location'),
        'quantity' => 1,
        'model' => $line[18],           //TODO (из свойств) или $line[4] - артикул
        'manufacturer' => getProductAttribute($line, 'manufacturer'),
        'image_name' => $imageName,
        'shipping' => 'yes',            // подтвердил Ventfabrika
        'price' => formatRawDecimal($line[5]),
        'points' => 0,          //TODO: wtf?
        'date_added' => $dateAdded,
        'date_modified' => $dateAdded,
        'date_available' => substr($dateAdded, 0, 10),
        'weight' => getProductAttribute($line, 'weight'),
        'weight_unit' => $weightUnit,
        'length' => 0,          //TODO (из свойств)
        'width' => 0,           //TODO (из свойств)
        'height' => 0,          //TODO (из свойств)
        'length_unit' => 'cm',  //TODO (из свойств)
        'status' => 'true',
        'tax_class_id' => 9,    //TODO: также может быть 100 - wtf
        'description(en-gb)' => cleanDescription($line[2]),   // полное описание товара (подумать куда девать короткое($line[1]) если надо)
        'meta_title(en-gb)' => ($line[13] ? $line[13] : $line[0]),    //TODO: обдумать правильно ли это
        'meta_description(en-gb)' => cleanDescription($line[1]),  //TODO: обдумать правильно ли это (это короткое описание)
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

    return $currentProductId++;
}

/**
 * Атрибуты, которые устанавливаются на странице Products
 * и потому которые не надо устанавливать на странице ProductAttributes
 */
$attributesUsedInProductInfo = [
    'location' => [
        'местоположение',
        'локация',
    ],
    'manufacturer' => [
        'производитель',
        'фирма производитель',
        'страна производитель',
        'страна производства',
    ],
    '' => [
        '',
    ],
];

function getProductAttribute($line, $name)
{
    return 1;
}

function cleanDescription($text)
{
    $text = preg_replace('/<[A-Za-z0-9 ]+>\s*описание\s*<\/[A-Za-z0-9 ]+>/ui', '', $text);
    $text = preg_replace('/<img[^>]*>/ui', '', $text);

    return $text;
}

function prepareImageGetPath($url)
{
    $path = '';

    $url = trim($url);
    if ($url) {
        if (!$image = file_get_contents($url)) {
            throw new \Exception('Не удалось получить изображение: ' . $url);
        }

        $pathExploded = explode('/', $url);
        $imageName = end($pathExploded);

        $taleDir = 'catalog/vent/' . $imageName[0];
        $dirName = __DIR__ . '/images/' . $taleDir;
        if (!is_dir($dirName)) {
            mkdir($dirName);
        }

        for (; ;) {
            $imagePath = $dirName . '/' . $imageName;
            if (is_file($imagePath)) {
                $nameExploded = explode('.', $imageName);
                $ext = end($nameExploded);
                $imageName = bin2hex(random_bytes(5)) . '.' . $ext;
            } else {
                break;
            }
        }

        if (file_put_contents($imagePath, $image) === false) {
            throw new \Exception('Не удалось сохранить изображение: ' . $url);
        }

        $path = $taleDir . '/' . $imageName;
    }

    return $path;
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
