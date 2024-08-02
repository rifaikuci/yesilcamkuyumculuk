<?php
global $db;

?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("smedia",'', $db, 'desc');

    $isVisibleColumn = ["counter", "title"];
    $columnName = [ "#", "Hesap Türü"];



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


