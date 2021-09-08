<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col-3 edit">
            <?php
            //print_r($this->data);
            use W1020\HTML\Select; ?>

            <form action="<?= $this->data['action'] ?>" method="post">
                <?php
                foreach ($this->data["comments"] as $field => $value) {

                    if ($field == "users_id") {

                        echo "<input type='hidden' name='$field' value='" . ($_SESSION['user']['id']) . "'><br>";
                    } elseif ($field == "countries_id") {
                        echo $value . "<br>";
                        echo (new Select())
                                ->setName($field)
                                ->setData($this->data["groupList2"])
                                ->setSelected($this->data["row"]['countries_id'] ?? "")
                                ->setClass("form-select form-select mb-3")
                                ->html() . '<br><br>';
                    } elseif ($field == "produkt_id1") {
                        echo $value . "<br>";
                        echo (new Select())
                                ->setName($field)
                                ->setData($this->data["groupList3"])
                                ->setSelected($this->data["row"]['produkt_id1'] ?? "")
                                ->setClass("form-control-lg form-group")
                                ->html() . '<br><br>';
                    } elseif ($field == "customers_id") {
                        echo $value . "<br>";
                        echo (new Select())
                                ->setName($field)
                                ->setData($this->data["groupList4"])
                                ->setSelected($this->data["row"]['customers_id'] ?? "")
                                ->html() . '<br><br>';
                    } elseif ($field == "data") {
                        echo $value . "<br>";
                        echo "<input type='date' name='$field' value='" . ($this->data['row'][$field] ?? "") . "'><br>";

                    } else {
                        echo $value . "<br>";
                        echo "<input name='$field' value='" . ($this->data['row'][$field] ?? "") . "'><br><br>";
                    }
                }
                ?>
                <input type="submit" value="ok" class="btn btn-primary">
            </form>
        </div>
        <div class="col">

        </div>
    </div>
</div>