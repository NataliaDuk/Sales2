<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-9 report">
            <?php

            use W1020\HTML\Pagination;
            use W1020\HTML\Table;

            foreach ($this->data["table"] as &$row) {
                $row['pass'] = '🔑🔑🔑';
            }
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
        </div>
        <div class="col">

        </div>
    </div>
</div>





