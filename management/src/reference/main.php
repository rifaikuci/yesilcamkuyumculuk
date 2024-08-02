<?php
global $db;
?>

<section class="content">
    <?php statusAlert(); ?>


    <?php
    $data = getAllDataWithSort("reference",'', $db, 'desc');

    $isVisibleColumn = ["counter","title"];
    $columnName = [ "#", "Referans Adı"];

    ?>
    <?php getTable([
            'data' => $data,
            'isVisibleColumn' => $isVisibleColumn,
            'columnName' => $columnName,
            'isInsert' => true,
            'isDelete' => true,
            'isUpdate' => true
    ]); ?>
</section>


