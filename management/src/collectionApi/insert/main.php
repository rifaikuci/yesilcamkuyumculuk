<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'collectionApiInsert', 'value' => 'collectionApiInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Api Key Ekleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['size' => 12, 'label' => 'Mail', 'placeholder' => 'Mail giriniz', 'name' => 'mail']);
                    getTextInput(['size' => 12, 'label' => 'Api Key', 'placeholder' => 'Api Key giriniz', 'name' => 'apiKey']);
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


