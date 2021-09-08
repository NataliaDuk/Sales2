<?php
//print_r($this->data);
use W1020\HTML\Select; ?>
<div class="container">
    <div class="row">
        <div class="col-6">

        </div>
        <div class="col edit">
            <form action="<?= $this->data['action'] ?>" method="post">
                <?php
                foreach ($this->data["comments"] as $field => $value) {
                    echo $value . "<br>";
                    if ($field == "user_groups_id") {
                        echo (new Select())
                                ->setName($field)
                                ->setData($this->data["groupList"])
                                ->setSelected($this->data["row"]['user_groups_id'] ?? "")
                                ->html() . '<br>';
                    } else {
                        echo "<input name='$field' value='" . ($this->data['row'][$field] ?? "") . "'><br>";
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
