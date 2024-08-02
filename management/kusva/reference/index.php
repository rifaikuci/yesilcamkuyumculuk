<?php
global $db;

$referenceTable = "reference";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_POST['referenceInsert'])) {

    $data = getDataForm([
        "link", "title"]);

    $path = getPath($dirName, $fileName);

    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $file = imageUpload("reference", 'image', '');
        if ($file == "image_large" || $file == "image_invalid_type" || $file == "image_not_upload") {
            redirectToPath($path, 'insert=' . "no");
            exit();
        }
    }
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $data['image'] = $file;
    }

    $lastId = insert($data, $referenceTable, $db);

    if ($lastId) {
        updateMd5($lastId, $referenceTable, $db);
    }
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['referenceUpdate'])) {
    $id = $_POST['referenceUpdate'];
    $data = getDataForm([
        "link", "title"]);


    $oldData = getDataRow($id, $referenceTable, $db);
    $path = getPath($dirName, $fileName);

    $isUpdate = "no";

    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $file = imageUpload("reference", 'image', '');

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

    $isUpdate = update($data, $referenceTable, $id, $db);


    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['referenceDelete'])) {
    $id = $_GET['referenceDelete'];

    $isSuccess = delete($id, $referenceTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}

if (isset($_GET['referenceImageDelete'])) {
    $id = $_GET['referenceImageDelete'];
    $row = getDataRow($id, $referenceTable, $db);

    if (file_exists("../" . $row['image'])) {
        unlink("../" . $row['image']);
    }

    $data['image'] = null;
    update($data, $referenceTable, $id, $db);


    $path = getPath($dirName, $fileName);
    header("Location: $path/update/?id=$id");
}
