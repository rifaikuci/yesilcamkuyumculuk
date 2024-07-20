<?php
global $db;
?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("currency",'', $db, 'desc');

    $isVisibleColumn = ["counter","code", "title"];
    $columnName = [ "#", "Kod", "Başlık"];

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


