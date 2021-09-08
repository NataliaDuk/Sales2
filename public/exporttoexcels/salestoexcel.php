<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//        require_once('vendor/autoload.php');

//use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$sOutFile = 'out.xlsx';

$oSpreadsheet_Out = new Spreadsheet();

$oSpreadsheet_Out->getProperties()->setCreator('Maarten Balliauw')
    ->setLastModifiedBy('Maarten Balliauw')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file')
;

// Add some data
$oSpreadsheet_Out->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Привет 123')
    ->setCellValue('B2', 'world!')
    ->setCellValue('C1', 'Hello')
    ->setCellValue('D2', 'world!')
;

$oWriter = IOFactory::createWriter($oSpreadsheet_Out, 'Xlsx');
$oWriter->save($sOutFile);
?>