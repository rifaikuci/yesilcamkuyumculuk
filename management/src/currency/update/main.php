
<?php

if (isset($_GET['id'])) {
    global  $CURRENCY_DATA_TYPE;
    $id = $_GET['id'];
    $row = getDataRow($id, 'currency', $db);

}
?>


<section class="content">

    <form method="post" action="<?php echo baseUrlBack() . 'kusva/index.php' ?>"
          enctype="multipart/form-data">

        <?php
        getTextHidden(['name' => 'currencyUpdate', 'value' => $id]);
        ?>
        <div class="card card-dark">
            <div class="card-header">
                <h1 class="card-title">Döviz Tanım Güncelleme Bilgileri</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php
                    getTextInput(['label' => 'Döviz Kodu', 'placeholder' => 'Döviz Kodu giriniz', 'name' => 'code', 'value'=> $row['code']]);
                    getTextInput(['label' => 'Döviz Adı', 'placeholder' => 'Döviz Adı', 'name' => 'title', 'value'=> $row['title'], 'required' => true]);
                    getSelect(["label" => "Marj Türü", "placeholder" => "Marj Türü", "name"=>'type', "required" => false, "data" => $CURRENCY_DATA_TYPE, "value"=>$row['type']]);
                    getNumberInput(["label"=> "Değer", "placeholder"=>"Değer Giriniz", "name"=>"value", "step"=> "0.01", "value"=> $row['value']]);
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


