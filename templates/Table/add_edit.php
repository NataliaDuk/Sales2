<div class="container">
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6 edit">
            <?php
            //print_r($this->data);
            ?>

            <form action="<?= $this->data['action'] ?>" method="post">
                <?php
                foreach ($this->data["comments"] as $field => $value) {
                    echo $value . "<br>";
                    echo "<input name='$field' value='" . ($this->data['row'][$field] ?? "") . "'><br><br>";
                }
                ?>
                <input type="submit" value="Ok" class="btn btn-primary">
            </form>
        </div>
        <div class="col">

        </div>
    </div>
</div>