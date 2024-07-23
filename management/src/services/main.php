<?php
global $db;
?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("services",'', $db, 'desc');

    $isVisibleColumn = ["counter","title"];
    $columnName = [ "#", "Başlık"];

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


