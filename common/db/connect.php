<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=yesilcam_kuyumculuk', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (ErrorException  $exception) {
    echo $exception;
}

?>