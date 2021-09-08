<div>
    <div class="container info">
        <h3></h3>
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action list-group-item-primary" aria-current="true">
                <b>Торговые инструменты:</b>
            </button>
            <button type="button" class="list-group-item list-group-item-action"><a href="https://www.nbrb.by/statistics/rates/ratesdaily.asp">Курс белорусского рубля к иностранным валютам (Нацбанк РБ) </a></button>
            <button type="button" class="list-group-item list-group-item-action"><a href="http://dataportal.belstat.gov.by/AggregatedDb">Статистика внешней торговли Республики Беларусь (belstat) </a></button>
            <button type="button" class="list-group-item list-group-item-action"><a href="https://www.butb.by/shedule/">Белорусская универсальная товарная биржа (БУТБ) </a></button>
            <button type="button" class="list-group-item list-group-item-action"><a href="https://www.trademap.org">Статистика мировой торговли (TRADE MAP) </a></button>
            <button type="button" class="list-group-item list-group-item-action"><a href="https://www.clal.it/index.php">Анализ молочного рынка и мировые тенденции (clal.it) </a></button>
            <button type="button" class="list-group-item list-group-item-action"><a href="https://globaldairytrade.info/">Мировой аукцион молочного рынка (GTD) </a></button>
            <button type="button" class="list-group-item list-group-item-action"><a href="https://mcx.gov.ru/ministry/departments/departament-ekonomiki-investitsiy-i-regulirovaniya-rynkov/industry-information/info-monitoring-rynkov-apk/">Мониторинг рынков АПК России</a></button>
        </div>
    </div>
    <div class="container">
        <h1>Продажи. Форма для заполнения.</h1>
        <button id="mezved_to_excel" class="btn btn-primary" style="margin-left: 1050px" onclick="location.href='/public/">Export to Excel</button><br>
<br>
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
            ->setCellValue('A1', 'Привет 555')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!')
        ;

        $oWriter = IOFactory::createWriter($oSpreadsheet_Out, 'Xlsx');
        $oWriter->save($sOutFile);
        ?>
        <?php
        use W1020\HTML\Pagination;
        use W1020\HTML\Table;
        echo (new Table())
            ->setData($this->data["table"])
            ->setHeaders($this->data["comments"])
            ->addColumn(fn($row) => "<a href='?type={$this->data['controllerName']}&action=del&id=$row[id]'><img src='/public/images/sales/del.png' ></a>")
            ->addColumn(fn($row) => "<a href='?type={$this->data['controllerName']}&action=showedit&id=$row[id]'><img src='/public/images/sales/edit.png' ></a>")
            ->setClass("table table-striped table-hover table-bordered border-primary")
            ->html();
        echo (new Pagination())
            ->setUrlPrefix("?type={$this->data['controllerName']}&action=show&page=")
            ->setPageCount($this->data["pageCount"])
            ->setActivePage($this->data["activePage"])
            ->html();
        ?>
        <a href="?type=<?= $this->data['controllerName'] ?>&action=showadd" class="btn btn-primary">Добавить</a>


        <!--        <button style="float: left" class="btn btn-primary" <a href="?type=sale&action=export"></a>Export to Excel</button><br>-->
    </div>
</div>

