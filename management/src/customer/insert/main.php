<?php

$insertUser = isset($_SESSION['userId']) ? $_SESSION['userId'] : 2;

?>
<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'insertUser', 'value' => $insertUser]);
        getTextHidden(['name' => 'customerInsert', 'value' => 'customerInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Müşteri Ekleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['size'=>12, 'label' => 'Ad Soyad', 'placeholder' => 'Ad Soyad giriniz', 'name' => 'shortName', 'required' => true]);
                    ?>
                </div>

            </div>
        </div>


        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-success', 'align' => 'right', 'title' => 'Ekle']); ?>
        </div>
    </form>
</section>


