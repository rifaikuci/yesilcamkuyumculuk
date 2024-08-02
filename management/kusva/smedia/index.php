<?php
global $db;

$smediaTable = "smedia";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_POST['smediaInsert'])) {

    $data = getDataForm([
        "title", "className", 'link']);


    $path = getPath($dirName, $fileName);


    $lastId = insert($data, $smediaTable, $db);

    if ($lastId) {
        updateMd5($lastId, $smediaTable, $db);
    }
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['smediaUpdate'])) {
    $id = $_POST['smediaUpdate'];
    $data = getDataForm([
        "title", "className", 'link']);


    $oldData = getDataRow($id, $smediaTable, $db);
    $path = getPath($dirName, $fileName);

    $isUpdate = update($data, $smediaTable, $id, $db);


    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['smediaDelete'])) {
    $id = $_GET['smediaDelete'];

    $isSuccess = delete($id, $smediaTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}

