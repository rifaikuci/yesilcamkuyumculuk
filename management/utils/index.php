<?php

$lang = 'tr';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function requireControlUtilFile($file, $depth = 5) {
    for ($i = 0; $i < $depth; $i++) {
        $path = str_repeat('../', $i) . $file;
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
}

requireControlUtilFile('utils/forms/index.php');

requireControlUtilFile('common/db/index.php');
requireControlUtilFile('common/methods/index.php');
requireControlUtilFile('common/data/index.php');

?>
