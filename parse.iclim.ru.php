<?php

if (!empty($_POST['parse_brands'])) {

    $dr = new DataReader();
    $dr->login();
    $brandList = $dr->getSublist($_POST['cid']);

    $url = trim($_POST['url']);
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    $load = $dom->loadHTMLFile($url);
    $xpath = new DOMXPath($dom);
    $rootXPath = "//div[@class='bx-filter-parameters-box-title']/span[@class='bx-filter-parameters-box-hint'][contains(text(),'Бренд')]/parent::div/following::div[@class='bx-filter-block'][1]//span[@class='bx-filter-input-checkbox']";
    if ($brandsRoot = $xpath->query($rootXPath)) {
        foreach ($brandsRoot as $brand) {
            $imgElem = $xpath->query("./span[@class='bx-filter-param-text']/text()", $brand)->item(0)->textContent;
            $imgElem = trim($imgElem);
            if ($key = array_search($imgElem, $brandList)) {
                $elementCid = $key;
            } else {
                $elementCid = $dr->createSubelement($_POST['cid'], $imgElem);
                sleep(1);
            }

            $dataElem = $xpath->query("./input", $brand)->item(0);
            $id = $dataElem->getAttribute('id');
            $value = $dataElem->getAttribute('value');
            $tmpUrl = rtrim($url, '/') . '/?CALL_AJAX=Y&filter='
                . urlencode($id) . ':' . urlencode($value) . '&sort=shows&order=&PAGEN_1=1';

            $elementUrl = getResponseLocationHeader($tmpUrl);
            if (!$elementUrl) {
                throw new Exception("Response Location не найден. Url: " . $tmpUrl);
            }
            //$tmpUrl = 'https://iclim.ru/catalog/ventilyatsiya/ventilyatory/kanalnye_ventilyatory_dlya_kruglykh_kanalov/?CALL_AJAX=Y&filter=arCatalogFilter_20_841453994:Y&sort=shows&order=&PAGEN_1=1';
            $resultString .= parseBrand($elementUrl,
                $elementCid,
                $_POST['percent'],
                "'$_POST[cat_name]' => '$imgElem'",
                $_POST['email']
            );
        }
    } else {
        throw new Exception("Ошибка поиска брендов. Url: " . $url);
    }

} else {
    $resultString .= parseBrand($_POST['url'], $_POST['cid'], $_POST['percent'], $_POST['cat_name'], $_POST['email']);
}
