<?php

$holidaysTable = "holidays";
$dirName = basename(__DIR__);
$fileName = basename(__FILE__, ".php");

if (isset($_GET['getHolidays'])) {
    $data = getAllData($holidaysTable, "", $db);
    $holidays = array_map(function($holiday) {
        return [
            'title' => $holiday['name'],
            'start' => $holiday['date'],
            'end' => $holiday['date'],
            'backgroundColor' => 'rgba(187,33,36, .9)',
            'borderColor' => 'rgba(187,33,36, .9)'
        ];
    }, $data);

    echo json_encode($holidays);
    exit();
}


if (isset($_POST['holidaysInsert'])) {

    $data = getDataForm(["date", "name"]);
    $lastId = insert($data, $holidaysTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['holidaysUpdate'])) {
    $id = $_POST['holidaysUpdate'];
    $data = getDataForm(["date", "name"]);

    $isUpdate = update($data, $holidaysTable, $id, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['holidaysDelete'])) {
    $id = $_GET['holidaysDelete'];
    $isSuccess = delete($id, $holidaysTable, $db);
    $path = getPath($dirName, $fileName);
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}
