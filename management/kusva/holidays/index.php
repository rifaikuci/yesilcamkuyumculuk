<?php

if(isset($_GET['getHolidays'])) {
    $data = getAllData("holidays", "", $db);
    $holidays = [];

    foreach ($data as $holiday) {
        $holidays[] = [
            'title' => $holiday['name'],
            'start' => $holiday['date'],
            'end' => $holiday['date'],
            'backgroundColor' => 'rgba(187,33,36, .9)',
            'borderColor' => 'rgba(187,33,36, .9)'
        ];
    }

    echo json_encode($holidays);
}