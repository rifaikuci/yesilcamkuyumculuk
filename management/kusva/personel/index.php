<?php
global $db;

$personelTable = "personel";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_POST['personelInsert'])) {

    $data = getDataForm(["shortName", "username", "password"]);
    $lastId = insert($data, $personelTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['personelUpdate'])) {
    $id = $_POST['personelUpdate'];
    $data = getDataForm(["shortName", "username", "password"]);

    $isUpdate = update($data, $personelTable, $id, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['personelDelete'])) {
    $id = $_GET['personelDelete'];
    $isSuccess = delete($id, $personelTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}
