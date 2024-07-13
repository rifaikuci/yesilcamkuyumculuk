<?php

function baseUrlBack() {
    return 'http://localhost/yesilcamkuyumculuk/management/';
}

function baseUrlFront() {
    return 'http://localhost/yesilcamkuyumculuk/';
}

function firmName() {
    return "Yeşilçam Kuyumculuk";
}

function imageBaseUrl() {
    return "assets/images/";
}

function pdfBaseUrl() {
    return "assets/pdf/";
}

function isUrlActive($link) {
    return strpos($_SERVER['REQUEST_URI'], $link) !== false;
}

function isTreeOpen($array) {
    foreach ($array as $item) {
        if (isUrlActive("src/" . $item)) {
            return true;
        }
    }
    return false;
}

function getColumn($row, $title, $lang) {
    if ($lang === "tr") {
        return $row[$title];
    }
    return $row[$title . "E"] ?? $row[$title]; // Use null coalescing operator
}

function getLabel($tr, $eng, $lang) {
    return ($lang === "tr") ? $tr : $eng;
}

?>
