<?php

global $db;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getDataRow($id, 'services', $db);

}
?>


<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'servicesUpdate', 'value' => $id]);
        ?>


        <div class="card card-dark">
            <div class="card-header">
                <?php expandableHeader(); ?>
                <h1 class="card-title">Servis Güncelleme Bilgileri (Türkçe)</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput([ 'label' => 'Başlık', 'placeholder' => 'Başlık giriniz', 'name' => 'title', 'required' => true, 'value' => $row['title'] ]);
                    getTextArea(['size'=>12, 'label'=>'Açıklama', 'name' => 'description', 'placeholder'=>'Açıklama giriniz', 'value' => $row['description'] ]);
                    getTextInput([ 'label' => 'Meta Keywords', 'placeholder' => 'Keywords giriniz', 'name' => 'metaKeywords', 'value' => $row['metaKeywords'] ]);
                    getTextArea(['size'=>12, 'label'=>'Meta Açıklama', 'name' => 'metaDescription', 'placeholder'=>'Meta Açıklama giriniz', 'value' => $row['metaDescription'] ]);
                    ?>
                </div>
            </div>
        </div>

        <div class="card card-dark">
            <div class="card-header">
                <?php expandableHeader(); ?>
                <h1 class="card-title">Servis Güncelleme Bilgileri (İngilizce)</h1>
            </div>

            <div class="card-body">
                <div class="row">

                    <?php
                        getTextInput([ 'label' => 'Başlık', 'placeholder' => 'Başlık giriniz', 'name' => 'titleE', 'value' => $row['titleE'] ]);
                        getTextArea(['size'=>12, 'label'=>'Açıklama', 'name' => 'descriptionE', 'placeholder'=>'Açıklama giriniz', 'value' => $row['descriptionE'] ]);
                        getTextInput([ 'label' => 'Meta Keywords', 'placeholder' => 'Keywords giriniz', 'name' => 'metaKeywordsE', 'value' => $row['metaKeywordsE'] ]);
                        getTextArea(['size'=>12, 'label'=>'Meta Açıklama', 'name' => 'metaDescriptionE', 'placeholder'=>'Meta Açıklama giriniz', 'value' => $row['metaDescriptionE'] ]);
                    ?>
                </div>
            </div>
        </div>

        <?php

        getTextInput(['size'=> 4, 'label' => 'Class İsmi', 'placeholder' => 'Class İsmi', 'name' => 'className', 'value' => $row['className'] ]);
        if($row['image'] != "") {
            getViewFile(["label" =>"resim", 'path'=> $row['image'], 'id'=> $id]);
            echo "<br>";
        }

        getInputFile([]);

        ?>



        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-primary', 'align' => 'right', 'title' => 'Güncelle']); ?>
        </div>
    </form>
</section>


