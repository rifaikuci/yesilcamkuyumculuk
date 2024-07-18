<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'holidaysInsert', 'value' => 'holidaysInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Tatil Ekleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['size' => 6, 'label' => 'Tatil Adı', 'placeholder' => 'Tatil adı giriniz', 'name' => 'name']);
                    getDatetime(['size' => 6, 'label' => "Tatil Tarihi", 'name' => 'date']);
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


