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

require_once __DIR__ . '/saveExcelImport.php';

//die('3');
error_reporting(E_ALL);
ini_set('display_errors', 1);

ignore_user_abort(true);
set_time_limit(0);

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

logg("\n\n+++++++++++++++++++++++++++++++++++\nПарсинг начат >>>");

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
                logExit('Нет категории ' . $categoryName);
            }

            if (!$imgContent = file_get_contents($rootUrl . $imageSrc)) {
                logExit('Не могу получить изображение категории $imageSrc');
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
        logExit('Не могу получить alreadyParsedCategories.json');
    }

    if (($alreadyParsedCategories = json_decode($alreadyParsedCategoriesJson, true)) === false) {
        logExit('Неверный JSON формат alreadyParsedCategories.json');
    }

    if ($brandsRoot = $xpath->query($rootXPath)) {
        foreach ($brandsRoot as $brandContainer) {
            $categoryName = trim($xpath->query(".//h5[@class='content__sub-text']", $brandContainer)
                ->item(0)->nodeValue);

            if (!isset($categoryIds[$categoryName])) {
                logExit('Нет категории ' . $categoryName);
            }

            $categoryHref = trim($xpath->query(".//a[@class='content__sub-btn']", $brandContainer)
                ->item(0)->getAttribute('href'));

            if (in_array($categoryHref, $alreadyParsedCategories)) {
                logg("Категория '$categoryName' уже распарсена.");
                continue;
            }

            parseCategory($categoryName, $categoryHref, $rootUrl);

            $alreadyParsedCategories[] = $categoryHref;

            if (!file_put_contents(__DIR__ . '/alreadyParsedCategories.json', json_encode($alreadyParsedCategories))) {
                logExit('Не могу сохранить в alreadyParsedCategories.json. Последняя распарсенная категория: ' . $categoryName);
            }

            logg("Добавлена новая категория $categoryName ($categoryHref)");
        }
    }
}

function parseCategory($categoryName, $categoryHref, $rootUrl)
{
    global $categoryIds;

    $categoryDir = __DIR__ . '/parsedXlsx/' . $categoryName;
    if (!is_dir($categoryDir)) {
        mkdir($categoryDir);
    }

    $categoryId = $categoryIds[$categoryName];

    logg(">>>> Начат парсинг категории '$categoryName' ($categoryHref)");

    $alreadyParsedProductsJson = file_get_contents(__DIR__ . '/alreadyParsedProducts.json');
    if (($alreadyParsedProducts = json_decode($alreadyParsedProductsJson, true)) === false) {
        logExit('Неверный формат файла alreadyParsedProducts.json (или ошибка чтения).');
    }

    $products = [];

    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    if (!$load = $dom->loadHTMLFile($rootUrl . $categoryHref)) {
        logExit('Не грузица страница со списком товаров ' . $rootUrl . $categoryHref);
    }
    $xpath = new DOMXPath($dom);

    $productsXPath = "//div[@id='products-content']//div[@class='name-item__wrapper']";

    if ($productsRoot = $xpath->query($productsXPath)) {
        foreach ($productsRoot as $prodContainer) {
            // Найдем имя
            $prod['a'] = $xpath->query("./div[@class='name-item-desc']/a[@class='name-item_head']", $prodContainer)->item(0);
            $prod['name'] = trim($prod['a']->nodeValue);
            $prod['href'] = trim($prod['a']->getAttribute('href'));

            logg("Проверка на подпродукты: '$prod[name]' ($prod[href])");
            if (($subProductsContainer = $xpath->query(".//div[@class='name-item__subWrap']", $prodContainer))
                && $subProductsContainer->length
            ) {
                logg("Продукт '$prod[name]' ($prod[href]) содержит подпродукты");
                // Содержит подсписок
                if (($subProductsList = $xpath->query(".//div[@class='name-item__sub']", $subProductsContainer->item(0)))
                    && $subProductsList->length
                ) {
                    foreach ($subProductsList as $subProd) {
                        if ($subProdContent['a'] = $xpath->query(".//a[@class='name-item-head']", $subProd)) {
                            if ($subProdContent['a_item'] = $subProdContent['a']->item(0)) {
                                $subProdContent['href'] = trim($subProdContent['a_item']->getAttribute('href'));
                                $subProdContent['name'] = trim($subProdContent['a_item']->nodeValue);
                                if (in_array($subProdContent['href'], $alreadyParsedProducts)) {
                                    continue;
                                }
                                $products[] = parseProduct($subProdContent['href'], $subProdContent['name'], $alreadyParsedProducts, $rootUrl, $categoryId);
                            } else {
                                logg("Не могу найти подпродукты для '$subProdContent[name]' ($subProdContent[href]) (позиция 2)");
                            }
                        } else {
                            logg("Не могу найти подпродукты для '$prod[name]' ($prod[href]) (позиция 1)");
                        }
                    }
                } else {
                    logg("Должны быть подпродукты, но они не найдены '$prod[name]' ($prod[href])");
                }
            } else {
                $products[] = parseProduct($prod['href'], $prod['name'], $alreadyParsedProducts, $rootUrl, $categoryId);
            }
        }

        logg("- Сохраняем в Excel '$categoryName' ($categoryHref)");

        if ($products) {
            $productToSave = [];
            foreach ($products as $prod) {
                $productToSave[] = $prod;
                if (count($productToSave) > 19) {
                    if (!putElemsToExcell($productToSave, $categoryId, $categoryName)) {
                        loggWarn("Не удалось сохранить товары категории '$categoryName' ($categoryHref)");
                        exit;
                    }
                    foreach ($productToSave as $pts) {
                        $alreadyParsedProducts[] = $pts['href'];
                        file_put_contents(__DIR__ . '/alreadyParsedProducts.json', json_encode($alreadyParsedProducts));
                    }
                    $productToSave = [];
                }
            }

            if (count($productToSave)) {
                if (!putElemsToExcell($productToSave, $categoryId, $categoryName)) {
                    loggWarn("Не удалось сохранить товары категории '$categoryName' ($categoryHref)");
                    exit;
                }
                foreach ($productToSave as $pts) {
                    $alreadyParsedProducts[] = $pts['href'];
                    file_put_contents(__DIR__ . '/alreadyParsedProducts.json', json_encode($alreadyParsedProducts));
                }
                $productToSave = [];
            }

            logg("<<<< Продукты сохранены: '$categoryName' ($categoryHref)");

        } else {
            loggWarn("- А где продукты?? '$categoryName' ($categoryHref)");
            exit;
        }

        // Обработка пэджинатинга
        if ($nextPage = $xpath->query("//div[@id='products-content']//a[@id='NextLink']")->item(0)) {
            $nextPageUrl = trim($nextPage->getAttribute('href'));
            logg('-- Новая страница: ' . $nextPageUrl);
            parseCategory($categoryName, $nextPageUrl, $rootUrl);
        }

    } else {
        logExit('Не найдены товары на странице ' . $rootUrl . $categoryHref);
    }
}

function parseProduct($href, $name, &$alreadyParsedProducts, $rootUrl, $categoryId)
{
    logg("Начинаем парсить продукт $name ($href)");

    /*if (rand(0, 4) == 3) {
        sleep(1);
    }*/

    if (in_array($href, $alreadyParsedProducts)) {
        logg("Продукт $name ($href) уже распарсен");
        return true;
    }

    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    if (!$load = $dom->loadHTMLFile($rootUrl . $href)) {
        loggWarn('Не грузица страница с товаром ' . $rootUrl . $href);
        return false;
    }
    $xpath = new DOMXPath($dom);

    $product['categoryId'] = $categoryId;
    $product['href'] = $href;

    // Название
    if ((!$node = $xpath->query("//h1[contains(@class,'content-head')]")->item(0))
        || (!$product['name'] = trim($node->nodeValue))
    ) {
        loggWarn('Не найдено название для ' . $rootUrl . $href . '. Товар не размещен в базе.');
        return false;
    }

    // Артикул
    if (($node = $xpath->query("//div[@class='sku']/span")->item(0))
        && ($product['sku'] = trim($node->nodeValue))
    ) {
        $product['sku'] = substr($product['sku'], 0, 4) . rand(0, 9) . rand(0, 9) . rand(0, 9);
    } else {
        $product['sku'] = 608 . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
    }

    // Цена
    if (($node = $xpath->query("//p[contains(@class,'product__content-cost')]/span")->item(0))
        && ($product['price'] = trim($node->nodeValue))
    ) {
        $price = (float)str_replace([' ', ','], ['', '.'], $product['price']);
        $product['price'] = trim(number_format($price * 0.975, 2, '.', ''), '0');
    } else {
        $product['price'] = '0';
        loggWarn('Не найдена цена для ' . $rootUrl . $href);
    }

    // Описание
    $product['description'] = '';
    if ($node = $xpath->query("//div[@class='product__content-description']/p")->item(0)) {
        $product['description'] = trim($node->nodeValue);
    }

    // Технические характеристики
    $product['specifications'] = [];
    if ($nodes = $xpath->query("//div[@class='product__content-feature']//p[@class='product__content-feature_in']")) {
        foreach ($nodes as $n) {
            if (($nameNode = $xpath->query(".//span[@class='product__content-feature_text']", $n)->item(0)) !== null
                && ($valueNode = $xpath->query(".//span[@class='product__content-feature-sell']", $n)->item(0)) !== null
            ) {
                $product['specifications'][] = [
                    'name' => $nameNode->nodeValue,
                    'value' => $valueNode->nodeValue,
                ];
            } else {
                loggWarn('Неправильный формат технической характеристики для ' . $rootUrl . $href);
            }
        }
    }
    if (!$product['specifications']) {
        loggWarn('Не найдены технические характеристики для ' . $rootUrl . $href);
    }

    // Изображение
    $product['imagePath'] = '';
    $imageContent = false;
    if ($node = $xpath->query("//div[@class='product__content-pic']//a[@class='zoom']")->item(0)) {
        $imageHref = trim($node->getAttribute('href'));
        if (!$imageContent = file_get_contents($imageHref)) {
            logg('Изображение не грузится для ' . $rootUrl . $href);
        }
    } else {
        loggWarn('Не найдена ссылка на изображение для ' . $rootUrl . $href);
    }
    if ($imageContent) {
        $parsedImageHref = pathinfo($imageHref);
        $imgExtension = $parsedImageHref['extension'] ?? 'jpg';
        $imagePath = __DIR__ . '/images/catalog/vent/wilo';
        while (true) {
            $randFilename = uniqid('', true) . ".$imgExtension";
            if (!file_exists("$imagePath/$randFilename")) {
                break;
            }
        }
        $product['imagePath'] = "catalog/vent/wilo/$randFilename";
        file_put_contents("$imagePath/$randFilename", $imageContent);
    }

    gc_collect_cycles();

    //$alreadyParsedProducts[] = $href;
    //file_put_contents(__DIR__ . '/alreadyParsedProducts.json', json_encode($alreadyParsedProducts));

    logg('Подготовлен (распарсен) товар ' . $rootUrl . $href);

    return $product;
}

function loggWarn($msg)
{
    logg('!!!!!!!!!!!! > ' . $msg);
}

function logg($msg)
{
    echo "$msg\n";
    $txt = date('Y-m-d H:i:s') . ' > ' . $msg . "\n";
    file_put_contents(__DIR__ . '/log.log', $txt, FILE_APPEND);
}

function logExit($msg)
{
    logg($msg);
    logg('Парсин закончен с ошибкой!');
    die("$msg\nПарсин закончен с ошибкой!\n");
}

parseAllCategories($xpath, $rootXPath, $rootUrl, $categoryIds);

logg("\nПарсинг успешно закончен!\n");

