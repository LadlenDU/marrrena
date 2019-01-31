<?php
/**
 * Парсинг структуры каталогов с x218025.storeland.ru
 * для импорта в OpenCart версии 3
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dirStructure = include 'dirStructure.php';

$csv[] = [
    'category_id',
    'parent_id',
    'name(en-gb)',
    'name(ru-ru)',
    'top',
    'columns',
    'sort_order',
    'image_name',
    'date_added',
    'date_modified',
    //'seo_keyword',
    'description(en-gb)',
    'description(ru-ru)',
    'meta_title(en-gb)',
    'meta_title(ru-ru)',
    'meta_description(en-gb)',
    'meta_description(ru-ru)',
    'meta_keywords(en-gb)',
    'meta_keywords(ru-ru)',
    'store_ids',
    'layout',
    'status',
];

function parseElems($elems, $parent_id = 0)
{
    global $csv;

    //static $categId = 1;

    foreach ($elems as $e) {
        $name = $e['data'];
        //TODO: костыль - убираем последнее число если есть
        $name = preg_replace('/\s+\d+$/','', $name);
        $csv[] = [
            $e['attributes']['id'], //'category_id',
            $parent_id, //'parent_id',
            $name, //'name(en-gb)',
            $name, //'name(ru-ru)',
            !$parent_id ? 'true' : 'false', //'top',
            1, //TODO: расчитывать из кол-ва потомков 'columns',
            0, //TODO: рассмотреть 'sort_order',
            '', //'image_name', //TODO: сделать
            date('Y-m-d H:i:s'), //'date_added',
            date('Y-m-d H:i:s'), //'date_modified',
            //makeSlugs($e['data']), //'seo_keyword',
            '', //'description(en-gb)',
            '', //'description(ru-ru)',
            '', //'meta_title(en-gb)',
            '', //'meta_title(ru-ru)',
            '', //'meta_description(en-gb)',
            '', //'meta_description(ru-ru)',
            '', //'meta_keywords(en-gb)',
            '', //'meta_keywords(ru-ru)',
            0, //'store_ids',
            '', //'layout',
            'true', //'status',
        ];

        if (!empty($e['children'])) {
            parseElems($e['children'], $e['attributes']['id']);
        }
    }
}

parseElems($dirStructure['children']);

/*function format_uri($string, $separator = '-')
{
    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
    $special_cases = array('&' => 'and', "'" => '');
    $string = mb_strtolower(trim($string), 'UTF-8');
    $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
    $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
    $string = preg_replace("/[$separator]+/u", "$separator", $string);
    return $string;
}*/

function my_str_split($string)
{
    $slen=strlen($string);
    for($i=0; $i<$slen; $i++)
    {
        $sArray[$i]=$string{$i};
    }
    return $sArray;
}

function noDiacritics($string)
{
    //cyrylic transcription
    $cyrylicFrom = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
    $cyrylicTo   = array('A', 'B', 'W', 'G', 'D', 'Ie', 'Io', 'Z', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'Ch', 'C', 'Tch', 'Sh', 'Shtch', '', 'Y', '', 'E', 'Iu', 'Ia', 'a', 'b', 'w', 'g', 'd', 'ie', 'io', 'z', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'ch', 'c', 'tch', 'sh', 'shtch', '', 'y', '', 'e', 'iu', 'ia');


    $from = array("Á", "À", "Â", "Ä", "Ă", "Ā", "Ã", "Å", "Ą", "Æ", "Ć", "Ċ", "Ĉ", "Č", "Ç", "Ď", "Đ", "Ð", "É", "È", "Ė", "Ê", "Ë", "Ě", "Ē", "Ę", "Ə", "Ġ", "Ĝ", "Ğ", "Ģ", "á", "à", "â", "ä", "ă", "ā", "ã", "å", "ą", "æ", "ć", "ċ", "ĉ", "č", "ç", "ď", "đ", "ð", "é", "è", "ė", "ê", "ë", "ě", "ē", "ę", "ə", "ġ", "ĝ", "ğ", "ģ", "Ĥ", "Ħ", "I", "Í", "Ì", "İ", "Î", "Ï", "Ī", "Į", "Ĳ", "Ĵ", "Ķ", "Ļ", "Ł", "Ń", "Ň", "Ñ", "Ņ", "Ó", "Ò", "Ô", "Ö", "Õ", "Ő", "Ø", "Ơ", "Œ", "ĥ", "ħ", "ı", "í", "ì", "i", "î", "ï", "ī", "į", "ĳ", "ĵ", "ķ", "ļ", "ł", "ń", "ň", "ñ", "ņ", "ó", "ò", "ô", "ö", "õ", "ő", "ø", "ơ", "œ", "Ŕ", "Ř", "Ś", "Ŝ", "Š", "Ş", "Ť", "Ţ", "Þ", "Ú", "Ù", "Û", "Ü", "Ŭ", "Ū", "Ů", "Ų", "Ű", "Ư", "Ŵ", "Ý", "Ŷ", "Ÿ", "Ź", "Ż", "Ž", "ŕ", "ř", "ś", "ŝ", "š", "ş", "ß", "ť", "ţ", "þ", "ú", "ù", "û", "ü", "ŭ", "ū", "ů", "ų", "ű", "ư", "ŵ", "ý", "ŷ", "ÿ", "ź", "ż", "ž");
    $to   = array("A", "A", "A", "AE", "A", "A", "A", "A", "A", "AE", "C", "C", "C", "C", "C", "D", "D", "D", "E", "E", "E", "E", "E", "E", "E", "E", "G", "G", "G", "G", "G", "a", "a", "a", "ae", "ae", "a", "a", "a", "a", "ae", "c", "c", "c", "c", "c", "d", "d", "d", "e", "e", "e", "e", "e", "e", "e", "e", "g", "g", "g", "g", "g", "H", "H", "I", "I", "I", "I", "I", "I", "I", "I", "IJ", "J", "K", "L", "L", "N", "N", "N", "N", "O", "O", "O", "OE", "O", "O", "O", "O", "CE", "h", "h", "i", "i", "i", "i", "i", "i", "i", "i", "ij", "j", "k", "l", "l", "n", "n", "n", "n", "o", "o", "o", "oe", "o", "o", "o", "o", "o", "R", "R", "S", "S", "S", "S", "T", "T", "T", "U", "U", "U", "UE", "U", "U", "U", "U", "U", "U", "W", "Y", "Y", "Y", "Z", "Z", "Z", "r", "r", "s", "s", "s", "s", "ss", "t", "t", "b", "u", "u", "u", "ue", "u", "u", "u", "u", "u", "u", "w", "y", "y", "y", "z", "z", "z");


    $from = array_merge($from, $cyrylicFrom);
    $to   = array_merge($to, $cyrylicTo);

    $newstring=str_replace($from, $to, $string);
    return $newstring;
}

function makeSlugs($string, $maxlen=0)
{
    $newStringTab=array();
    $string=strtolower(noDiacritics($string));
    if(function_exists('str_split'))
    {
        $stringTab=str_split($string);
    }
    else
    {
        $stringTab=my_str_split($string);
    }

    $numbers=array("0","1","2","3","4","5","6","7","8","9","-");
    //$numbers=array("0","1","2","3","4","5","6","7","8","9");

    foreach($stringTab as $letter)
    {
        if(in_array($letter, range("a", "z")) || in_array($letter, $numbers))
        {
            $newStringTab[]=$letter;
        }
        elseif($letter==" ")
        {
            $newStringTab[]="-";
        }
    }

    if(count($newStringTab))
    {
        $newString=implode($newStringTab);
        if($maxlen>0)
        {
            $newString=substr($newString, 0, $maxlen);
        }

        $newString = removeDuplicates('--', '-', $newString);
    }
    else
    {
        $newString='';
    }

    return $newString;
}


function checkSlug($sSlug)
{
    if(preg_match("/^[a-zA-Z0-9]+[a-zA-Z0-9\-]*$/", $sSlug) == 1)
    {
        return true;
    }

    return false;
}

function removeDuplicates($sSearch, $sReplace, $sSubject)
{
    $i=0;
    do{

        $sSubject=str_replace($sSearch, $sReplace, $sSubject);
        $pos=strpos($sSubject, $sSearch);

        $i++;
        if($i>100)
        {
            die('removeDuplicates() loop error');
        }

    }while($pos!==false);

    return $sSubject;
}

$fp = fopen('dir.parse.open.cart.ver.3.csv', 'w');

foreach ($csv as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);
