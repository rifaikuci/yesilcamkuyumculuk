
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getDataRow($id, 'personel', $db);

}
?>


<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'personelUpdate', 'value' => $id]);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Personel Güncelleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                        <?php
                        getTextInput(['size'=>12, 'label' => 'Ad Soyad', 'placeholder' => 'Ad Soyad giriniz', 'name' => 'shortName', 'required' => true, 'value'=> $row['shortName']]);
                        getTextInput([ 'label' => 'Kullanıcı Adı (Girilen Kullanıcı Adı ile giriş yapılacak)', 'placeholder' => 'Kullanıcı Adı giriniz', 'name' => 'username', 'required' => true, 'value'=>$row['username']]);
                        getTextInput([ 'label' => 'Şifre', 'placeholder' => 'Şifre Giriniz', 'name' => 'password', 'required' => true, 'value'=>$row['password']]);
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


