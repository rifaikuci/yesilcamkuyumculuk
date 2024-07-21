<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getDataRow($id, 'customer', $db);

}
?>


<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'customerUpdate', 'value' => $id]);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Müşteri Güncelleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['size' => 12, 'label' => 'Ad Soyad', 'placeholder' => 'Ad Soyad giriniz', 'name' => 'shortName', 'required' => true, 'value' => $row['shortName']]);
                    ?>
                </div>

            </div>
        </div>


        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-primary', 'align' => 'right', 'title' => 'Güncelle']); ?>
        </div>
    </form>
</section>


