<?php
/*
 * Для импорта продуктов - схема названий колонок (по страницам)
 *
 */

$titleScheme['Products'] = [
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

$titleScheme['AdditionalImages'] = [
    'product_id',
    'image',
    'sort_order',
];

$titleScheme['Specials'] = [
    'product_id',
    'customer_group',
    'priority',
    'price',
    'date_start',
    'date_end',
];

$titleScheme['Discounts'] = [
    'product_id',
    'customer_group',
    'quantity',
    'priority',
    'price',
    'date_start',
    'date_end',
];

$titleScheme['Rewards'] = [
    'product_id',
    'customer_group',
    'points',
];

$titleScheme['ProductOptions'] = [
    'product_id',
    'option',
    'default_option_value',
    'required',
];

$titleScheme['ProductOptionValues'] = [
    'product_id',
    'option',
    'option_value',
    'quantity',
    'subtract',
    'price',
    'price_prefix',
    'points',
    'points_prefix',
    'weight',
    'weight_prefix',
];

$titleScheme['ProductAttributes'] = [
    'product_id',
    'attribute_group',
    'attribute',
    'text(en-gb)',
    'text(ru-ru)',
];

$titleScheme['ProductFilters'] = [
    'product_id',
    'filter_group',
    'filter',
];

$titleScheme['ProductSEOKeywords'] = [
    'product_id',
    'store_id',
    'keyword(en-gb)',
    'keyword(ru-ru)',
];


return $titleScheme;
