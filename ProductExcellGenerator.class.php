<?php

/**
 * Для генерации xlsx таблиц продуктов с сайта storeland.ru
 *
 */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductExcellGenerator
{
    public $spreadsheet;
    public $sheets = [];

    public function __construct($firstSheetName)
    {
        $this->spreadsheet = new Spreadsheet();

        $this->sheets[$firstSheetName] = $this->spreadsheet->getActiveSheet();
        $this->sheets[$firstSheetName]->setTitle($firstSheetName);
    }

    public function addSheet($name)
    {
        if (isset($this->sheets[$name])) {
            throw new \Exception('Уже есть такая страница: ' . $name);
        }

        $this->sheets[$name] = new Worksheet($this->spreadsheet, $name);
        $this->spreadsheet->addSheet($this->sheets[$name]);
    }

    public function setSheetHeader($sheetName, array $data)
    {
        $this->setSheetRow($sheetName, 1, $data);
    }

    public function setSheetRow($sheetName, $row, array $data)
    {
        if (isset($this->sheets[$sheetName])) {
            throw new \Exception('Такой страницы нет: ' . $sheetName);
        }

        foreach ($data as $columnIndex => $value) {
            $this->sheets[$sheetName]->setCellValueByColumnAndRow($columnIndex, $row, $value);
        }
    }

    public function saveToFile($fileName)
    {
        $writer = new Xlsx($this->spreadsheet);
        $writer->save($fileName);
    }
}
