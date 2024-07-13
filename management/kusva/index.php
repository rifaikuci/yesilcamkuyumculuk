<?php
session_start();

// Function to require utils file
function requireUtils() {
    $paths = [
        "utils/index.php",
        "../utils/index.php",
        "../../utils/index.php",
        "../../../utils/index.php",
        "../../../../utils/index.php",
        "../../../../../utils/index.php",
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
}

requireUtils();

// Include login page
require_once "login/index.php";

// Check if the session is set
if (isset($_SESSION['management'])) {
    $modules = [
        "common/index.php",
    ];

    // Include all module files
    foreach ($modules as $module) {
        require_once $module;
    }
} else {
    session_destroy();
    header("Location: " . baseUrlBack() . "/src/login/?session=no");
    exit();
}
?>
