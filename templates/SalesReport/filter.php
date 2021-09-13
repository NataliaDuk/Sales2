<?php
//
//
use W1020\HTML\Table;
//



?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-8 col-xl-8 report">
            <h1>Анализ продаж по месяцам</h1>
            <h2>за период с <?= date("d.m.Y", strtotime($_POST['startdata'])); ?>
                по <?= date("d.m.Y", strtotime($_POST['enddata'])); ?></h2>


            <?php


            echo (new Table())
                ->setData($this->data["table"])
                ->setHeaders(["Месяц_год", "Предприятие", "Стоимость, тыс.долл."])
                ->setClass("table table-bordered border-primary table-striped table-hover")
                ->html();
//                        error_reporting(E_ALL);
//                        ini_set('display_errors', 'On');
//                        //        require_once('vendor/autoload.php');
//
//                        use PhpOffice\PhpSpreadsheet\Helper\Sample;
//                        use PhpOffice\PhpSpreadsheet\IOFactory;
//                        use PhpOffice\PhpSpreadsheet\Spreadsheet;
//
//
//                        $sOutFile = 'out.xlsx';
//            $filename = 'out.xlsx';
//            header('Content-Type: application/vnd.ms-excel');
//            header('Content-Disposition: attachment;filename=' . $filename);
//            header('Cache-Control: max-age=0');
//                        $oSpreadsheet_Out = new Spreadsheet();
//
//                        //$oSpreadsheet_Out->getProperties()->setCreator('Maarten Balliauw')
//                        //    ->setLastModifiedBy('Maarten Balliauw')
//                        //    ->setTitle('Office 2007 XLSX Test Document')
//                        //    ->setSubject('Office 2007 XLSX Test Document')
//                        //    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
//                        //    ->setKeywords('office 2007 openxml php')
//                        //    ->setCategory('Test result file');
//
//            //        // Add some data
//            $oSpreadsheet_Out->setActiveSheetIndex(0)
//                ->setCellValue('A1', 'Год')
//                ->setCellValue('B1', 'Предприятие')
//                ->setCellValue('C1', 'Стоимость, тыс.долл.');
//            //print_r($this->data["table"]);
//
//            $count = 2;
//
//            foreach ($this->data["table"] as $key => $row) {
//
//                $oSpreadsheet_Out->setActiveSheetIndex(0)
//                    ->setCellValue('A' . $count, $row['MONTH_YEAR'])
//                    ->setCellValue('B' . $count, $row['users_id'])
//                    ->setCellValue('C' . $count, $row['cost']);
//                $count++;
//            }
//
//
//
////            $Excel_writer->save('php://output');
////
////            $oWriter = IOFactory::createWriter($oSpreadsheet_Out, 'Xlsx');
////            $oWriter->save($sOutFile);
//            ?>
<!--               <button class="btn btn-primary" onclick="location.href='/public/">Export to Excel</button>-->
<!--            <button class="btn btn-primary" onclick="location.href='/public/">Export to Excel</button>-->
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xl-2">

        </div>
    </div>
</div>