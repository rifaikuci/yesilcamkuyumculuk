<?php
global $db;
?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("collectionApi",'', $db, 'asc');

    $isVisibleColumn = ["counter","mail", "insertDate"];
    $columnName = [ "#", "Mail", "Kayıt Tarihi"];

    for ($i = 0; $i < count($data); $i++) {
        $data[$i]['insertDate'] = dateString($data[$i]['insertDate']);
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


