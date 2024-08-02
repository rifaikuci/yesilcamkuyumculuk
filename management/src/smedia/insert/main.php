<?php


?>
<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'smediaInsert', 'value' => 'smediaInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Döviz Tanımı Ekleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['label' => 'Sosyal Medya', 'placeholder' => 'Hesap Türü', 'name' => 'title']);
                    getTextInput(['label' => 'Class Name', 'placeholder' => 'ClassName', 'name' => 'className']);
                    getTextInput(['size' => 12, 'label' => 'Link (Url)', 'placeholder' => 'Link giriniz', 'name' => 'link']);
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


