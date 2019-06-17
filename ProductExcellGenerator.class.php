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

    /** @var array номер текущей строки для каждого листа по названию */
    public $currentRows = [];

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
        $this->currentRows[$sheetName] = 2;
    }

    public function addSheetRow($sheetName, array $data)
    {
        $this->setSheetRow($sheetName, $this->currentRows[$sheetName]++, $data);
    }

    public function setSheetRow($sheetName, $row, array $data)
    {
        if (!isset($this->sheets[$sheetName])) {
            throw new \Exception('Такой страницы нет: ' . $sheetName);
        }

        $columnIndex = 0;
        foreach ($data as $value) {
            $this->sheets[$sheetName]->setCellValueByColumnAndRow(++$columnIndex, $row, $value);
        }
    }

    public function saveToFile($fileName)
    {
        $success = false;

        try {
            $writer = new Xlsx($this->spreadsheet);
            $writer->save($fileName);
            $success = true;
        } catch (\Exception $e) {
            echo 'Не удалось сохранить Excel файд. Ошибка: ' . $e->getMessage();
        }

        return $success;
    }
}
