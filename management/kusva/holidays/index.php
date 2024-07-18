<?php

$holidaysTable = "holidays";

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

function redirectToPath($path, $status) {
    header("Location: $path/?$status");
    exit();
}

function getPath() {
    $dirName = basename(__DIR__);
    $fileName = basename(__FILE__, ".php");
    $path = baseUrlBack() . "src/" . $dirName;
    if ($fileName != "index") {
        $path .= "/" . $fileName;
    }
    return $path;
}

if (isset($_POST['holidaysInsert'])) {
    $data = getDataForm(["date", "name"]);
    $lastId = insert($data, $holidaysTable, $db);
    $path = getPath();
    redirectToPath($path, 'insert=' . ($lastId ? "ok" : "no"));
}

if (isset($_POST['holidaysUpdate'])) {
    $id = $_POST['holidaysUpdate'];
    $data = getDataForm(["date", "name"]);

    $isUpdate = update($data, $holidaysTable, $id, $db);
    $path = getPath();
    redirectToPath($path, 'update=' . ($isUpdate ? "ok" : "no"));
}

if (isset($_GET['holidaysDelete'])) {
    $id = $_GET['holidaysDelete'];
    $isSuccess = delete($id, $holidaysTable, $db);
    $path = getPath();
    redirectToPath($path, 'delete=' . ($isSuccess ? "ok" : "no"));
}
