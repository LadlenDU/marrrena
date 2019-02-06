<?php
/**
 * Разбивка .xlsx файлов импорта продуктов в OpenCart на маленькие части, пригодные для
 * импорта с небольшим кол-вом RAM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

set_time_limit(0);
ini_set('memory_limit', '990M');

require 'vendor/autoload.php';

require_once 'ProductExcellGenerator.class.php';
require_once 'DataReader.class.php';


$sourceDir = 'import';

$dir = new DirectoryIterator($sourceDir);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        if ($fileinfo->isFile()) {
            $fName = $fileinfo->getFilename();
            $dirName = explode('.', $fName)[0];

            $splittingDirName = $sourceDir . '/' . $dirName;

            if (is_dir($splittingDirName)) {
                throw new \Exception('Директория уже существует: ' . $dirName);
            }

            mkdir($splittingDirName);
        }
    }
}


