<?php

/**
 * Парсинг в vent-fabrika.ru из elit-nasos.ru
 *
 * >>>
 * https://elit-nasos.ru/catalog/nasosy-povysheniya-davleniya    давай еще это закачаем.
 * .сюдаhttp://www.vent-fabrika.ru/index.php?route=product/category&path=5457640_5452143_5452144
 * насосы Wilo пункт делай в этом разделе,и в нее залей
 * <<<
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Связь ID категорий с их названиями
$categoryIds = [
    'Насосы повышения давления' => 6295925,     //5457640_5452143_5452144_6295924_6295925
    'Циркуляционные насосы' => 6295926,         //5457640_5452143_5452144_6295924_6295926
    'Поверхностные насосы' => 6295927,          //5457640_5452143_5452144_6295924_6295927
    'Погружные насосы' => 6295928,              //5457640_5452143_5452144_6295924_6295928
    'Насосы для скважины' => 6295929,           //5457640_5452143_5452144_6295924_6295929
    'Насосные станции' => 6295930,              //5457640_5452143_5452144_6295924_6295930
    'Колодезные насосы' => 6295931,             //5457640_5452143_5452144_6295924_6295931
    'Дренажные насосы' => 6295932,              //5457640_5452143_5452144_6295924_6295932
    'Насосы для грязной воды' => 6295933,       //5457640_5452143_5452144_6295924_6295933
    'Насосы для чистой воды' => 6295934,        //5457640_5452143_5452144_6295924_6295934
    'Фекальные насосы' => 6295935,              //5457640_5452143_5452144_6295924_6295935
    'Канализационные насосы' => 6295936,        //5457640_5452143_5452144_6295924_6295936
    'Консольные насосы (насосные станции)' => 6295937,   //5457640_5452143_5452144_6295924_6295937
    'Центробежные насосы' => 6295938,                    //5457640_5452143_5452144_6295924_6295938
    'Вихревые насосы' => 6295939,               //5457640_5452143_5452144_6295924_6295939
    'Самовсасывающие насосы' => 6295940,        //5457640_5452143_5452144_6295924_6295940
    'Насосы с мокрым ротором' => 6295941,       //5457640_5452143_5452144_6295924_6295941
    'Насосы с сухим ротором' => 6295942,        //5457640_5452143_5452144_6295924_6295942
    'Блочные насосы' => 6295943,                //5457640_5452143_5452144_6295924_6295943
    'Сетевые насосы' => 6295944,                //5457640_5452143_5452144_6295924_6295944
    'Тепловые насосы' => 6295945,               //5457640_5452143_5452144_6295924_6295945
    'Энергосберегающие насосы' => 6295946,              //5457640_5452143_5452144_6295924_6295946
    'Автоматика и приборы управления' => 6295947,       //5457640_5452143_5452144_6295924_6295947
    'Запасные части для насосов WILO' => 6295948,       //5457640_5452143_5452144_6295924_6295948
];

$rootUrl = 'https://elit-nasos.ru';

$dom = new DOMDocument;
$dom->preserveWhiteSpace = false;
$load = $dom->loadHTMLFile($rootUrl . '/products');
$xpath = new DOMXPath($dom);

$rootXPath = "//div[@class='content__catalog']/div[contains(@class,'content__sub')]";

function getAndCheckCategoryImages($xpath, $rootXPath, $rootUrl, $categoryIds)
{
    if ($brandsRoot = $xpath->query($rootXPath)) {
        foreach ($brandsRoot as $brandContainer) {
            // Изображение категории
            $imageSrc = $xpath->query(".//img[@class='content__sub-img']", $brandContainer)
                ->item(0)->getAttribute('src');

            $categoryName = trim($xpath->query(".//h5[@class='content__sub-text']", $brandContainer)
                ->item(0)->nodeValue);

            if (!isset($categoryIds[$categoryName])) {
                die('Нет категории ' . $categoryName);
            }

            if (!$imgContent = file_get_contents($rootUrl . $imageSrc)) {
                die('Не могу получить изображение категории $imageSrc');
            }

            file_put_contents(__DIR__ . '/categoryImages/' . $categoryName . '.jpg', $imgContent);
        }
    }
}

// Изображения собраны
//getAndCheckCategoryImages($xpath, $rootXPath, $rootUrl, $categoryIds);

function parseAllCategories($xpath, $rootXPath, $rootUrl, $categoryIds)
{
    if (!$alreadyParsedCategoriesJson = file_get_contents(__DIR__ . '/alreadyParsedCategories.json')) {
        die('Не могу получить alreadyParsedCategories.json');
    }

    if (!$alreadyParsedCategories = json_decode($alreadyParsedCategoriesJson, true)) {
        die('Неверный JSON формат alreadyParsedCategories.json');
    }

    if ($brandsRoot = $xpath->query($rootXPath)) {
        foreach ($brandsRoot as $brandContainer) {
            $categoryName = trim($xpath->query(".//h5[@class='content__sub-text']", $brandContainer)
                ->item(0)->nodeValue);

            if (!isset($categoryIds[$categoryName])) {
                die('Нет категории ' . $categoryName);
            }

            $categoryHref = trim($xpath->query(".//a[@class='content__sub-btn']", $brandContainer)
                ->item(0)->getAttribute('href'));

            if (in_array($categoryHref, $alreadyParsedCategories)) {
                continue;
            }

            parseCategory($categoryHref, $xpath, $rootXPath, $rootUrl, $categoryIds);

            $alreadyParsedCategories[] = $categoryHref;

            if (!file_put_contents(__DIR__ . '/alreadyParsedCategories.json', json_encode($alreadyParsedCategories))) {
                die('Не могу сохранить в alreadyParsedCategories.json. Последняя распарсенная категория: ' . $categoryName);
            }
        }
    }
}

function parseCategory($categoryHref, $xpath, $rootXPath, $rootUrl, $categoryIds)
{

}

parseAllCategories($xpath, $rootXPath, $rootUrl, $categoryIds);

echo "Парсинг закончен\n";

