<?php
/**
 * Разбивка .xlsx файлов импорта продуктов в OpenCart на маленькие части, пригодные для
 * импорта с небольшим кол-вом RAM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

set_time_limit(0);
ini_set('memory_limit', '990M');

require_once 'ProductExcellGenerator.class.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWrite;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


$sourceDir = 'import';

$dir = new DirectoryIterator($sourceDir);
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
        if ($fileinfo->isFile()) {
            $splitter = new Splitter($sourceDir, $fileinfo->getFilename());
            $splitter->splitSheet('Products');
        }
    }
}

class Splitter
{
    public $origSpreadsheet;
    public $splittingDirName;

    const MAX_ROWS = 10;

    public function __construct($sourceDir, $fName)
    {
        $this->origSpreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($sourceDir . '/' . $fName);

        $dirName = explode('.', $fName)[0];
        $this->splittingDirName = $sourceDir . '/' . $dirName;
        /*if (is_dir($this->splittingDirName)) {
            throw new \Exception('Директория уже существует: ' . $dirName);
        }*/
        @mkdir($this->splittingDirName);
    }

    public function splitSheet($sheetName)
    {
        $sheet = $this->origSpreadsheet->getSheetByName($sheetName);

        $excellGenerator = new ProductExcellGenerator($sheetName);

        $rowIterator = $sheet->getRowIterator();
        foreach ($rowIterator as $keyRow => $row) {

            $rowData = [];

            $cellIterator = $row->getCellIterator();
            foreach ($cellIterator as $keyCell => $cell) {
                $rowData[] = $cell->getValue();
            }

            if ($keyRow == 1) {
                $excellGenerator->setSheetHeader($sheetName, $rowData);
            } else {
                $excellGenerator->addSheetRow($sheetName, $rowData);
            }
        }

        $excellGenerator->saveToFile($this->splittingDirName . '/' . $sheetName . '.xlsx');
    }
}
