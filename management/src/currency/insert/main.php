<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'currencyInsert', 'value' => 'currencyInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Döviz Tanımı Ekleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['size' => 4, 'label' => 'Döviz Kodu', 'placeholder' => 'Döviz Kodu giriniz', 'name' => 'code']);
                    getTextInput(['size' => 4, 'label' => 'Döviz Adı', 'placeholder' => 'Döviz Adı', 'name' => 'title', 'required' => true]);
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


