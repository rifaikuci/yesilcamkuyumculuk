<?php
global $db;

$customerTable = "customer";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_POST['customerInsert'])) {

    $data = getDataForm(["shortName", "insertUser"]);

    $lastId = insert($data, $customerTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['customerUpdate'])) {
    $id = $_POST['customerUpdate'];
    $data = getDataForm(["shortName"]);

    $isUpdate = update($data, $customerTable, $id, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['customerDelete'])) {
    $id = $_GET['customerDelete'];
    $isSuccess = delete($id, $customerTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}
