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

require_once "login/index.php";

// Check if the session is set

$modules = [
    "common/index.php",
    "holidays/index.php",
];

// Include all module files
foreach ($modules as $module) {
    require_once $module;
}

?>
