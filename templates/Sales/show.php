<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">

            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action list-group-item-primary"
                        aria-current="true">


                    <b>Торговые инструменты:</b>
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a
                            href="https://www.nbrb.by/statistics/rates/ratesdaily.asp">Курс белорусского рубля к
                        иностранным
                        валютам (Нацбанк РБ) </a></button>
                <button type="button" class="list-group-item list-group-item-action"><a
                            href="http://dataportal.belstat.gov.by/AggregatedDb">Статистика внешней торговли Республики
                        Беларусь (belstat) </a></button>
                <button type="button" class="list-group-item list-group-item-action"><a
                            href="https://www.butb.by/shedule/">Белорусская
                        универсальная товарная биржа (БУТБ) </a></button>
                <button type="button" class="list-group-item list-group-item-action"><a href="https://www.trademap.org">Статистика
                        мировой торговли (TRADE MAP) </a></button>
                <button type="button" class="list-group-item list-group-item-action"><a
                            href="https://www.clal.it/index.php">Анализ молочного рынка и мировые тенденции
                        (clal.it) </a>
                </button>
                <button type="button" class="list-group-item list-group-item-action"><a
                            href="https://globaldairytrade.info/">Мировой аукцион молочного рынка (GTD) </a></button>
                <button type="button" class="list-group-item list-group-item-action"><a
                            href="https://mcx.gov.ru/ministry/departments/departament-ekonomiki-investitsiy-i-regulirovaniya-rynkov/industry-information/info-monitoring-rynkov-apk/">Мониторинг
                        рынков АПК России</a></button>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-9 col-xl-9 report">

            <h1>Продажи. Форма для заполнения.</h1>

            <br>
            <!--        <a class="btn btn-success"  href="-->
            <? //=base_url('sales/spreadsheet_format_download');?><!--" target="_blank">Download Excel Format</a>-->
            <!--        <a class="btn btn-info"  href="?type=sales&action=show" target="_blank">Download Excel Data</a>-->
            <!--        <a class="btn btn-info"  onclick="location.href='/public/" target="_blank">Download Excel Data</a>-->
            <br>
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


<!--                    <button style="float: left" class="btn btn-primary" <a href="?type=sale&action=export"></a>Export to Excel</button><br>-->
            <a class="btn btn-info"  href="?type=sales&action=export" target="_blank">Download Excel Data</a>
            <?php


            ?>
        </div>
    </div>
</div>


