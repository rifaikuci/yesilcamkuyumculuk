<?php

function sayiFormatla($sayi, $delimiter = 2) {
    // Set default delimiter if not provided
    if ($delimiter === 0) {
        return number_format($sayi, 0, ',', '.');
    }

    // Use provided delimiter, default to 2 if empty
    return number_format($sayi, $delimiter ?: 2, ',', '.');
}

function stockDailyClear($stockId, $db) {
    $row = getDataRow($stockId, 'stockItem', $db);

    // Extract values from the row
    $month = $row['month'];
    $bValue = $row['bValue'];
    $cValue = $row['cValue'];
    $totalLot = $row['totalLot'];

    // Calculate days and result
    $day = $month * 30;
    $result = $bValue - $cValue;

    // Avoid division by zero
    if ($totalLot === 0 || $day === 0) {
        return 0; // or handle error as needed
    }

    return ($result / $totalLot) / $day;
}
