<?php

/**
 * Получение атрибутов с https://x218025.storeland.ru/admin/store_goods_attr
 *
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

$content = file_get_contents('list.txt');

$pattern = '/<div\s*class="name_table">\s*<table>\s*<tr>\s*<td\s*class="name">\s*<span>(.+)<\/span>/i';
preg_match_all($pattern, $content, $matches);

array_walk($matches[1], function(&$value)
{
    $value = str_replace('&quot;', '"', $value);
});

print_r($matches[1]);
