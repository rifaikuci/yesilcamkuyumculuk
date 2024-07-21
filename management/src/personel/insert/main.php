<?php


?>
<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'personelInsert', 'value' => 'personelInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Personel Ekleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['size'=>12, 'label' => 'Ad Soyad', 'placeholder' => 'Ad Soyad giriniz', 'name' => 'shortName', 'required' => true]);
                    getTextInput([ 'label' => 'Kullanıcı Adı (Girilen Kullanıcı Adı ile giriş yapılacak)', 'placeholder' => 'Kullanıcı Adı giriniz', 'name' => 'username', 'required' => true]);
                    getTextInput([ 'label' => 'Şifre', 'placeholder' => 'Şifre Giriniz', 'name' => 'password', 'required' => true]);
                    ?>
                </div>
                <div class="row">

                </div>
            </div>
        </div>


        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-success', 'align' => 'right', 'title' => 'Ekle']); ?>
        </div>
    </form>
</section>


