<?php
global $db;
?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("holidays",'', $db, 'asc');

    $isVisibleColumn = ["counter","date", "name"];
    $columnName = [ "#", "Tarih", "Tatil"];

    for ($i = 0; $i < count($data); $i++) {
        $data[$i]['date'] = dateString($data[$i]['date']);
    }

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


