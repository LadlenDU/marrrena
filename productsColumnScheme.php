<?php
/*
 * Для импорта продуктов - схема названий колонок (по страницам)
 *
 */

$titleScheme['Products'] = [
    'product_id',
    'name(en-gb)',
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
    'meta_title(en-gb)',
    'meta_description(en-gb)',
    'meta_keywords(en-gb)',
    'stock_status_id',
    'store_ids',
    'layout',
    'related_ids',
    'tags(en-gb)',
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
];


return $titleScheme;
