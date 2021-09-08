<?php

namespace App\Controller;

use App\Model\ReportUserModel;

class UserReport extends Sales
{
    protected string $tableName = "sale";

    public function __construct()
    {
        parent::__construct();
        $config = include __DIR__ . "/../../config.php";
        $config["table"] = $this->tableName;
        $this->pageSize = $config["page_size"];
        $this->model = new ReportUserModel($config);
        $this->model->setUserId($_SESSION['user']['id']);
    }

    public function actionShow(): void
    {
        parent::actionShow(); // TODO: Change the autogenerated stub
        $this
            ->view
            ->addData([
                "groupList2" => $this->model->getGroupListCountries(),
                "groupList3" => $this->model->getGroupListProdukt(),
            ])
            ->setTemplate("UserReport/show");
    }

    public function actionFilter(): void
    {
        $this
            ->view
            ->addData([
                "table" => $this->model->getFilter($_POST['startdata'], $_POST['enddata'])
            ])
            ->setTemplate("UserReport/filter");
    }
    public function actionFilter1(): void
    {
        $this
            ->view
            ->addData([
                "table" => $this->model->getFilter1($_POST['startdata'], $_POST['enddata'])
            ])
            ->setTemplate("UserReport/filter1");
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

    public function actionAdd(): void
    {
        $_POST['users_id']=$_SESSION['user']['id'];
        parent::actionAdd(); // TODO: Change the autogenerated stub

    }


}