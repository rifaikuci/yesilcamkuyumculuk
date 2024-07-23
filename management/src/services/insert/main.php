
<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'servicesInsert', 'value' => 'servicesInsert']);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <?php expandableHeader(); ?>
                <h1 class="card-title">Servis Ekleme Bilgileri (Türkçe)</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                        getTextInput([ 'label' => 'Başlık', 'placeholder' => 'Başlık giriniz', 'name' => 'title', 'required' => true ]);
                        getTextArea(['size'=>12, 'label'=>'Açıklama', 'name' => 'description', 'placeholder'=>'Açıklama giriniz' ]);
                        getTextInput([ 'label' => 'Meta Keywords', 'placeholder' => 'Keywords giriniz', 'name' => 'metaKeywords' ]);
                        getTextArea(['size'=>12, 'label'=>'Meta Açıklama', 'name' => 'metaDescription', 'placeholder'=>'Meta Açıklama giriniz' ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="card card-dark">
            <div class="card-header">
                <?php expandableHeader(); ?>
                <h1 class="card-title">Servis Ekleme Bilgileri (İngilizce)</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput([ 'label' => 'Başlık', 'placeholder' => 'Başlık giriniz', 'name' => 'titleE' ]);
                    getTextArea(['size'=>12, 'label'=>'Açıklama', 'name' => 'descriptionE', 'placeholder'=>'Açıklama giriniz' ]);
                    getTextInput([ 'label' => 'Meta Keywords', 'placeholder' => 'Keywords giriniz', 'name' => 'metaKeywordsE' ]);
                    getTextArea(['size'=>12, 'label'=>'Meta Açıklama', 'name' => 'metaDescriptionE', 'placeholder'=>'Meta Açıklama giriniz' ]);
                    ?>
                </div>
            </div>
        </div>

        <?php
            getTextInput(['size'=> 4, 'label' => 'Class İsmi', 'placeholder' => 'Class İsmi', 'name' => 'className' ]);
            getInputFile([]);

        ?>


        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-success', 'align' => 'right', 'title' => 'Ekle']); ?>
        </div>
    </form>
</section>


