<?php

global $db;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getDataRow($id, 'reference', $db);

}
?>


<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'referenceUpdate', 'value' => $id]);
        ?>


        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Referans Bilgileri Güncelleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['label' => 'Referans Adı', 'placeholder' => 'Referans Adı giriniz', 'name' => 'title', 'required' => true, 'value' => $row['title']]);
                    getTextInput(['size' => 12, 'label' => 'Site linki', 'placeholder' => 'Site Linki giriniz', 'name' => 'link', 'value' => $row['link']]);
                    ?>
                </div>
            </div>
        </div>


        <?php

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


