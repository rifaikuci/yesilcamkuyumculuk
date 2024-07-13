<?php

try {
    $db =
        mysqli_connect("localhost", "root", "", "yesilcam_kuyumculuk");
    $db->set_charset("utf8");

} catch (ErrorException  $exception) {
    echo $exception;
}

?>