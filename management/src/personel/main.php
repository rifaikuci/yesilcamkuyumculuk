<?php
global $db;
?>

<section class="content">
    <?php statusAlert(); ?>

    <?php $data = getAllDataWithSort("personel",'', $db, 'desc');

    $isVisibleColumn = ["counter","shortName", "username"];
    $columnName = [ "#", "Ad Soyad", "Kullanıcı Adı"];

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


