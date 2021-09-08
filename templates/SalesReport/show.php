<?php
//print_r($this->data);
use W1020\HTML\Select; ?>

<div class="container">
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col-9 filter">
            <br>
            <h3>Выбрать данные для отчета:</h3><br>
            <form action="?type=salesreport&action=filter" method="post">
                <h3>1.Отчет за период по предприятиям (по месяцам)</h3><br>
                период с <input type="date" name="startdata">
                по <input type="date" name="enddata">
                <input type="submit" value="Выбрать" class="btn btn-primary">
            </form>
            <form action="?type=salesreport&action=filter1" method="post">
                <h3>2.Отчет за период по предприятиям (по годам)</h3><br>
                период с <input type="date" name="startdata">
                по <input type="date" name="enddata">
                <input type="submit" value="Выбрать" class="btn btn-primary">
            </form>
            <br>
            <h3>3.Отчет за период по стране</h3><br>
            <form action="?type=salesreport&action=filter2" method="post">
                период с <input type="date" name="startdata">
                по <input type="date" name="enddata">
                Страна <select name='countries'>
                    <?php
                    foreach ($this->data["groupList2"] as $id => $name) {
                        echo "<option value='$id' " .
                            (($this->data["row"]['countries_id'] == $id) ? "selected" : "") .
                            ">$name</option>";
                    }
                    echo "</select>";
                    ?>
                    <input type="submit" value="Выбрать" class="btn btn-primary">
            </form>
            <br>
            <h3>4.Отчет за период по виду продукции</h3><br>
            <form action="?type=salesreport&action=filter3" method="post">
                период с <input type="date" name="startdata">
                по <input type="date" name="enddata">
                Продукция <select name='produkt'>
                    <?php
                    foreach ($this->data["groupList3"] as $id => $name) {
                        echo "<option value='$id' " .
                            (($this->data["row"]['produkt_id1'] == $id) ? "selected" : "") .
                            ">$name</option>";
                    }
                    echo "</select>";
                    ?>
                    <input type="submit" value="Выбрать" class="btn btn-primary">
            </form>
        </div>
        <div class="col">
        </div>
    </div>
</div>

