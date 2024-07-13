<?php

$lang = 'tr';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function requireFile($file) {
    $paths = [
        $file,
        "../$file",
        "../../$file",
        "../../../$file",
        "../../../../$file"
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
}

requireFile('utils/index.php');


?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="<?php echo baseUrlBack() . "style/dist/img/favIcon/icon.png"; ?>">

    <title><?php echo function_exists('firmName') ? firmName() . " | " : "" ?> Anasayfa</title>
    <?php requireFile('include/style.php'); ?>
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <?php
        requireFile('include/sidebar-menu-icon.php');
        requireFile('include/top-bar-notification.php');
        ?>
    </nav>

    <?php requireFile('include/sidebar.php'); ?>

    <div class="content-wrapper">
        <?php require_once "main.php"; ?>
    </div>

    <?php requireFile('include/footer.php'); ?>
</div>

<?php requireFile('include/script.php'); ?>

</body>
</html>
