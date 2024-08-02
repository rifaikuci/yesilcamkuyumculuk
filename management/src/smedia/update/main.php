<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = getDataRow($id, 'smedia', $db);

}
?>


<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'smediaUpdate', 'value' => $id]);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Sosyal Medya Güncelleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php

                    getTextInput(['label' => 'Sosyal Medya', 'placeholder' => 'Hesap Türü', 'name' => 'title', 'value' => $row['title']]);
                    getTextInput(['label' => 'Class Name', 'placeholder' => 'ClassName', 'name' => 'className', 'value' => $row['className']]);
                    getTextInput(['size' => 12, 'label' => 'Link (Url)', 'placeholder' => 'Link giriniz', 'name' => 'link', 'value' => $row['link']]);

                    ?>
                </div>
                <div class="row">

                </div>
            </div>
        </div>


        <div class="card-footer">
            <?php getButton(['style' => 'btn btn-warning', 'align' => 'left', 'title' => 'Vazgeç']); ?>
            <?php getButton(['style' => 'btn btn-primary', 'align' => 'right', 'title' => 'Güncelle']); ?>
        </div>
    </form>
</section>


