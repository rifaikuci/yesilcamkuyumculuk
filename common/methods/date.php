<?php

function onlyDate($tarih)
{
    $tarih = date("d.m.Y", strtotime(explode(" ", $tarih)[0]));

    return $tarih;
}

function dateWithTime($tarih)
{
    $tarih = date_create($tarih);
    $tarih = date_format($tarih, "d.m.Y H:i");

    return $tarih;
}

function dateWithTimeSeconds($tarih)
{
    $tarih = date_create($tarih);
    $tarih = date_format($tarih, "d.m.Y H:i:s");

    return $tarih;
}

function dateString($tarih) {
    $date = onlyDate($tarih);
    $month = date("m",strtotime($date));
    $year = date("Y",strtotime($date));
    $day = date("d",strtotime($date));
    $monthString = "";
    if($month == "01") {
        $monthString = "Ocak";
    } elseif ($month == "02"){
        $monthString = "Şubat";
    } elseif ($month == "03"){
        $monthString = "Mart";
    } elseif ($month == "04"){
        $monthString = "Nisan";
    } elseif ($month == "05"){
        $monthString = "Mayıs";
    } elseif ($month == "06"){
        $monthString = "Haziran";
    } elseif ($month == "07"){
        $monthString = "Temmuz";
    } elseif ($month == "08"){
        $monthString = "Ağustos";
    } elseif ($month == "09"){
        $monthString = "Eylül";
    } elseif ($month == "10"){
        $monthString = "Ekim";
    } elseif ($month == "11"){
        $monthString = "Kasım";
    } elseif ($month == "12"){
        $monthString = "Aralık";
    }
    return $day ." " . $monthString . " " . $year;
}

function dateEngString($tarih) {
    $date = onlyDate($tarih);
    $month = date("m",strtotime($date));
    $year = date("Y",strtotime($date));
    $day = date("d",strtotime($date));
    $monthString = "";
    if($month == "01") {
        $monthString = "January";
    } elseif ($month == "02"){
        $monthString = "February";
    } elseif ($month == "03"){
        $monthString = "March";
    } elseif ($month == "04"){
        $monthString = "April";
    } elseif ($month == "05"){
        $monthString = "May";
    } elseif ($month == "06"){
        $monthString = "June";
    } elseif ($month == "07"){
        $monthString = "July";
    } elseif ($month == "08"){
        $monthString = "August";
    } elseif ($month == "09"){
        $monthString = "September";
    } elseif ($month == "10"){
        $monthString = "October";
    } elseif ($month == "11"){
        $monthString = "November";
    } elseif ($month == "12"){
        $monthString = "December";
    }
    return $day ." " . $monthString . " " . $year;
}

function dateValue($tarih) {
    $tarih = date_create($tarih);
    $tarih = date_format($tarih, "Y-m-d");

    return $tarih;
}


function onlyDateMonthTr($tarih) {

    $date = onlyDate($tarih);
    $month = date("m",strtotime($date));
    $year = date("Y",strtotime($date));
    $monthString = "";
    if($month == "01") {
        $monthString = "Ocak";
    } elseif ($month == "02"){
        $monthString = "Şubat";
    } elseif ($month == "03"){
        $monthString = "Mart";
    } elseif ($month == "04"){
        $monthString = "Nisan";
    } elseif ($month == "05"){
        $monthString = "Mayıs";
    } elseif ($month == "06"){
        $monthString = "Haziran";
    } elseif ($month == "07"){
        $monthString = "Temmuz";
    } elseif ($month == "08"){
        $monthString = "Ağustos";
    } elseif ($month == "09"){
        $monthString = "Eylül";
    } elseif ($month == "10"){
        $monthString = "Ekim";
    } elseif ($month == "11"){
        $monthString = "Kasım";
    } elseif ($month == "12"){
        $monthString = "Aralık";
    }
    return $monthString . " " . $year;
}

function onlyDateMonthEng($tarih) {
    $date = onlyDate($tarih);
    $month = date("m",strtotime($date));
    $year = date("Y",strtotime($date));
    $monthString = "";
    if($month == "01") {
        $monthString = "January";
    } elseif ($month == "02"){
        $monthString = "February";
    } elseif ($month == "03"){
        $monthString = "March";
    } elseif ($month == "04"){
        $monthString = "April";
    } elseif ($month == "05"){
        $monthString = "May";
    } elseif ($month == "06"){
        $monthString = "June";
    } elseif ($month == "07"){
        $monthString = "July";
    } elseif ($month == "08"){
        $monthString = "August";
    } elseif ($month == "09"){
        $monthString = "September";
    } elseif ($month == "10"){
        $monthString = "October";
    } elseif ($month == "11"){
        $monthString = "November";
    } elseif ($month == "12"){
        $monthString = "December";
    }
    return  $monthString . " " . $year;
}

function calculateTimeDifferenceSecond($startDateTime, $endDateTime) {
    $startTimestamp = strtotime($startDateTime);
    $endTimestamp = strtotime($endDateTime);

    return $endTimestamp - $startTimestamp;
}

function isPastDate($date1, $date2) {


    $dateTime1 = date_create($date1);
    $dateTime2 = date_create($date2);

// Saat, dakika ve saniyeyi sıfırla
    $dateTime1->setTime(0, 0, 0);
    $dateTime2->setTime(0, 0, 0);



    return $dateTime1 <= $dateTime2;
}

