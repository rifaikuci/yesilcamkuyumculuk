<?php

function getDataForm($arrayKey)
{
    $arrayKeyValue = [];
    foreach ($arrayKey as $key) {
        $arrayKeyValue[$key] = isset($_POST[$key]) ? $_POST[$key] : '';
    }
    return $arrayKeyValue;
}


function getDataFilter($array, $objectName, $searchValue)
{
    $data = array();
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i][$objectName] == $searchValue) {
            array_push($data, $array[$i]);
        }
    }
    return $data;
}

