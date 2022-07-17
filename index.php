<?php

$dir = file_get_contents(__DIR__ . '/base');
$files = glob('base/*.*');

$city = $argv[1];
$startNumber = $argv[2];

mkdir($city);

foreach($files as $file) {
    $information = exif_read_data($file, 0, true);

    $date = $information['IFD0']['DateTime'];

    rename($file, $city . '/' . $city . '_' . $startNumber . '_' . $date . '.NEF');

    $startNumber++;
}