<?php
global $db, $CURRENCY_DATA_TYPE;

?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("currency",'', $db, 'desc');

    $isVisibleColumn = ["counter","code", "title", 'type', 'value'];
    $columnName = [ "#", "Kod", "Başlık", "Marj Türü", "Değer"];

    for($i = 0; $i < count($data); $i++) {
        $data[$i]['type'] = $CURRENCY_DATA_TYPE[$data[$i]['type']];
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


