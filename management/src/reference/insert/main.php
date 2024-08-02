<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'referenceInsert', 'value' => 'referenceInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Referans Detay Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['label' => 'Referans Adı', 'placeholder' => 'Referans Adı giriniz', 'name' => 'title', 'required' => true]);
                    getTextInput(['size' => 12, 'label' => 'Site linki', 'placeholder' => 'Site Linki giriniz', 'name' => 'link']);
                    ?>
                </div>
            </div>
        </div>


        <?php
        getInputFile([]);

        ?>


        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-success', 'align' => 'right', 'title' => 'Ekle']); ?>
        </div>
    </form>
</section>


