<?php
global $db;

$currencyTable = "currency";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_POST['currencyInsert'])) {

    $data = getDataForm(["code", "title", "type", "value"]);
    $lastId = insert($data, $currencyTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['currencyUpdate'])) {
    $id = $_POST['currencyUpdate'];
    $data = getDataForm(["code", "title", "type", "value"]);

    $isUpdate = update($data, $currencyTable, $id, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['currencyDelete'])) {
    $id = $_GET['currencyDelete'];
    $isSuccess = delete($id, $currencyTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}
