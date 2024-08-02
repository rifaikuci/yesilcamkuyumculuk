<?php
session_start();

if (file_exists("utils/index.php")) {
    require_once "utils/index.php";
} elseif (file_exists("../utils/index.php")) {
    require_once "../utils/index.php";
} elseif (file_exists("../../utils/index.php")) {
    require_once "../../utils/index.php";
} elseif (file_exists("../../../utils/index.php")) {
    require_once "../../../utils/index.php";
} elseif (file_exists("../../../../utils/index.php")) {
    require_once "../../../../utils/index.php";
} elseif (file_exists("../../../../../utils/index.php")) {
    require_once "../../../../../utils/index.php";
}

function redirectToPath($path, $status) {
    header("Location: $path/?$status");
    exit();
}

function getPath( $dirName, $fileName) {
    $path = baseUrlBack() . "src/" . $dirName;
    if ($fileName != "index") {
        $path .= "/" . $fileName;
    }
    return $path;
}


require_once "login/index.php";


$modules = [
    "common/index.php",
    "holidays/index.php",
    "collectionApi/index.php",
    "currency/index.php",
    "personel/index.php",
    "customer/index.php",
    "services/index.php",
    "smedia/index.php",
    "reference/index.php",
];

// Include all module files
foreach ($modules as $module) {
    require_once $module;
}

?>
