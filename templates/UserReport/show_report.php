
<?php

use W1020\HTML\Pagination;
use W1020\HTML\Table;


unset($this->data["comments"]["id"]);
foreach ($this->data["table"] as &$row) {
    unset($row["id"]);
}
unset($this->data["comments"]["users_id"]);
foreach ($this->data["table"] as &$row) {
    unset($row["users_id"]);
}
unset($this->data["comments"]["customers_id"]);
foreach ($this->data["table"] as &$row) {
    unset($row["customers_id"]);
}
unset($this->data["comments"]["del"]);
unset($this->data["comments"]["edit"]);

echo (new Table())
    ->setData($this->data["table"])
    ->setHeaders($this->data["comments"])
    ->setClass("table table-striped table-hover")
    ->html();
echo (new Pagination())
    ->setUrlPrefix("?type={$this->data['controllerName']}&action=show&page=")
    ->setPageCount($this->data["pageCount"])
    ->setActivePage($this->data["activePage"])
    ->html();

?>
