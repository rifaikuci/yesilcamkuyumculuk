<?php

function seo($text) {
    $find = ['Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#'];
    $replace = ['c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp'];

    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);

    return $text;
}

function wordSplice($text, $limit) {
    $words = explode(' ', $text);
    if (count($words) > $limit) {
        return implode(' ', array_slice($words, 0, $limit)) . " ...";
    }
    return $text;
}

function wordCharacter($text, $limit) {
    if (strlen($text) <= $limit) {
        echo $text;
        return;
    }

    for ($i = 0; $i < 20; $i++) {
        if (isset($text[$limit + $i]) && $text[$limit + $i] === ' ') {
            echo substr($text, 0, $limit + $i) . "...";
            return;
        }
    }
}

function generateKeywordVariations($companyName) {
    $variations = [];
    $companyName = strtolower($companyName);
    $length = strlen($companyName);

    // Replace each character with all letters a-z
    for ($i = 0; $i < $length; $i++) {
        $char = $companyName[$i];
        $variations[] = substr_replace($companyName, $char, $i, 1);

        for ($j = ord('a'); $j <= ord('z'); $j++) {
            $newChar = chr($j);
            if ($newChar !== $char) {
                $variations[] = substr_replace($companyName, $newChar, $i, 1);
            }
        }
    }

    // Add characters at every position
    for ($i = 0; $i <= $length; $i++) {
        for ($j = ord('a'); $j <= ord('z'); $j++) {
            $newChar = chr($j);
            $variations[] = substr_replace($companyName, $newChar, $i, 0);
        }
    }

    // Remove each character
    for ($i = 0; $i < $length; $i++) {
        $variations[] = substr_replace($companyName, '', $i, 1);
    }

    return $variations;
}

