
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getDataRow($id, 'collectionApi', $db);

}
?>


<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'collectionApiUpdate', 'value' => $id]);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Api Key Güncelleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['size' => 12, 'label' => 'Mail', 'placeholder' => 'Mail giriniz', 'name' => 'mail', 'value'=> $row['mail']]);
                    getTextInput(['size' => 12, 'label' => 'Api Key', 'placeholder' => 'Api Key giriniz', 'name' => 'apiKey', 'value'=> $row['apiKey']]);
                    getDatetime(['size'=> 6, 'disabled'=> true, 'value'=> $row['insertDate']]);
                    ?>
                </div>
                <div class="row">

                </div>
            </div>
        </div>


        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-primary', 'align' => 'right', 'title' => 'Güncelle']); ?>
        </div>
    </form>
</section>


