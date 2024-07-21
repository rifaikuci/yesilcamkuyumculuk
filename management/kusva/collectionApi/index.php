<?php

global $db;

$collectionApiTable = "collectionApi";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_POST['collectionApiInsert'])) {

    $data = getDataForm(["mail", "apiKey"]);
    $lastId = insert($data, $collectionApiTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['collectionApiUpdate'])) {
    $id = $_POST['collectionApiUpdate'];
    $data = getDataForm(["mail", "apiKey"]);

    $isUpdate = update($data, $collectionApiTable, $id, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['collectionApiDelete'])) {
    $id = $_GET['collectionApiDelete'];
    $isSuccess = delete($id, $collectionApiTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}
