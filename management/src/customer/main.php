<?php
global $db;
?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("customer",'', $db, 'desc');

    $isVisibleColumn = ["counter","shortName"];
    $columnName = [ "#", "Ad Soyad"];

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


