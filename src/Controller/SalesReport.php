<?php

namespace App\Controller;

use App\Model\SalesReportModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

class SalesReport extends Sales
{
    protected string $tableName = "sale";

    public function __construct()
    {
        parent::__construct();
        $config = include __DIR__ . "/../../config.php";
        $config["table"] = $this->tableName;
        $this->pageSize = $config["page_size"];
        $this->model = new SalesReportModel($config);

    }

    /**
     * Показывает страницу, на которой осуществляется выбор отчета
     */
    public function actionShow(): void
    {
        parent::actionShow();

        $this->view
            ->addData([
                "groupList2" => $this->model->getGroupListCountries(),
                "groupList3" => $this->model->getGroupListProdukt(),
            ])
            ->setTemplate("SalesReport/show");
    }

    /**
     * Показывает страницу с отчетом
     */
    public function actionFilter(): void
    {
        $this
            ->view
            ->addData([
                "table" => $this->model->getFilter($_POST['startdata'], $_POST['enddata'])
            ])
            ->setTemplate("SalesReport/filter");
    }

    public function actionFilter1(): void
    {
        $this
            ->view
            ->addData([
                "table" => $this->model->getFilter1($_POST['startdata'], $_POST['enddata'])
            ])
            ->setTemplate("SalesReport/filter1");
    }

    public function actionFilter2(): void
    {
        $this
            ->view
            ->addData([
                "table" => $this->model->getFilter2($_POST['startdata'], $_POST['enddata'], $_POST['countries']),
            ])
            ->setTemplate("SalesReport/filter2");
    }

    public function actionFilter3(): void
    {
        $this
            ->view
            ->addData([
                "table" => $this->model->getFilter3($_POST['startdata'], $_POST['enddata'], $_POST['produkt']),
            ])
            ->setTemplate("SalesReport/filter3");
    }
    /**
     * осуществляет экспорт данных в Excel
     */
    public function actionExportFilter(): void
    {
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=exportfile.xls");

//        $this
//            ->view
//            ->addData([
//                "table" => $this->model->getFilter($_POST['startdata'], $_POST['enddata'])
//            ]);
        $getList=$this->data["table"];
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Анализ продаж по месяцам за период: c ' );
//echo date('d.m.Y', strtotime($_POST['startdata'])); echo date("d.m.Y", strtotime($_POST['enddata']));
//        $sheet->setCellValue('A2', 'Месяц');
//        $sheet->setCellValue('B2', 'предприятие');
//        $sheet->setCellValue('С2', 'Стоимость, тыс.долл.');
//        $count = 3;
//
//        foreach ($getlist as $row) {
//            $sheet->setCellValue('A' . $count, $row['MONTH_YEAR']);
//            $sheet->setCellValue('B' . $count, $row['users_id']);
//            $sheet->setCellValue('С' . $count, $row['cost']);
//            $count++;
//        }
//// Получаем ячейки и устаналиваем для них стили
//        $sheet->getStyle('A1:С1')->applyFromArray([
//            'font' => [
//                'name' => 'Arial',
//                'bold' => true,
//                'italic' => false,
//                'underline' => Font::UNDERLINE_NONE,
//                'strikethrough' => false,
//                'color' => [
//                    'rgb' => '000000'
//                ]
//            ],
//            'alignment' => [
//                'horizontal' => Alignment::HORIZONTAL_CENTER,
//                'vertical' => Alignment::VERTICAL_CENTER,
//                'wrapText' => true,
//            ]
//        ]);
//        $sheet->getStyle('A2:С2')->applyFromArray([
//            'font' => [
//                'name' => 'Arial',
//                'bold' => true,
//                'italic' => false,
//                'underline' => Font::UNDERLINE_NONE,
//                'strikethrough' => false,
//                'color' => [
//                    'rgb' => '000000'
//                ]
//            ],
//            'borders' => [
//                'allBorders' => [
//                    'borderStyle' => Border::BORDER_MEDIUM,
//                    'color' => [
//                        'rgb' => '000000'
//                    ]
//                ],
//            ],
//            'alignment' => [
//                'horizontal' => Alignment::HORIZONTAL_CENTER,
//                'vertical' => Alignment::VERTICAL_CENTER,
//                'wrapText' => true,
//            ]
//        ]);
//        //Установка высоты для 1 строки
//        $sheet->getRowDimension(1)->setRowHeight(30);
//        //Установка ширины столбцов
//        $sheet->getColumnDimension('A')->setWidth(10);
//        $sheet->getColumnDimension('B')->setWidth(40);
//        $sheet->getColumnDimension('C')->setWidth(20);
//        //Объединение ячеек
//        $sheet->mergeCells('A1:С1');
//        //Изменение цвета ячеек
//        $spreadsheet->getActiveSheet()->getStyle('A2:С2')
//            ->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('0000FF');
//
     //Запись на сервер файла excel
        $oWriter = IOFactory::createWriter($spreadsheet, 'Xls');
        $oWriter->save('php://output');


}


}