<?php
global $db;

$servicesTable = "services";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_POST['servicesInsert'])) {

    $data = getDataForm([
        "title", "titleE",
        "description", "descriptionE",
        "metaKeywordsE", "metaKeywordsE",
        "metaDescription", "metaDescriptionE", "className"]);

    $data['seoTitle'] = seo($data['title']);
    $data['seoTitleE'] = seo($data['titleE']);

    $path = getPath($dirName, $fileName);

    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $file = imageUpload("services", 'image', '');
        if ($file == "image_large" || $file == "image_invalid_type" || $file == "image_not_upload") {
            redirectToPath($path, 'insert=' . "no");
            exit();
        }
    }
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $data['image'] = $file;
    }

    $lastId = insert($data, $servicesTable, $db);

    if ($lastId) {
        updateMd5($lastId, $servicesTable, $db);
    }
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['servicesUpdate'])) {
    $id = $_POST['servicesUpdate'];
    $data = getDataForm([
        "title", "titleE",
        "description", "descriptionE",
        "metaKeywordsE", "metaKeywordsE",
        "metaDescription", "metaDescriptionE", "className"]);


    $oldData = getDataRow($id, $servicesTable, $db);
    $path = getPath($dirName, $fileName);

    $isUpdate = "no";

    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $file = imageUpload("services", 'image', '');

        if ($file == "image_large" || $file == "image_invalid_type" || $file == "image_not_upload") {

            header("Location:" . $path . "/index.php?hata=" . $file);
            exit();
        } else {

            if (file_exists("../" . $oldData['image'])) {
                unlink("../" . $oldData['image']);
            }

            if (isset($_FILES['image']) && $_FILES['image']['name']) {
                $data['image'] = $file;
            }
        }
    }

    $isUpdate = update($data, $servicesTable, $id, $db);


    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['servicesDelete'])) {
    $id = $_GET['servicesDelete'];

    $isSuccess = delete($id, $servicesTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}

if (isset($_GET['servicesImageDelete'])) {
    $id = $_GET['servicesImageDelete'];
    $row = getDataRow($id, $servicesTable, $db);

    if (file_exists("../" . $row['image'])) {
        unlink("../" . $row['image']);
    }

    $data['image'] = null;
    update($data, $servicesTable, $id, $db);


    $path = getPath($dirName, $fileName);
    header("Location: $path/update/?id=$id");
}
