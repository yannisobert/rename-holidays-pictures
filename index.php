<?php

// errors
if ($argv[2] === null){
    print_r('Argument missing.');

    exit(1);
} elseif (count($argv) > 3) {
    print_r('Too many arguments.');

    exit(1);
}

// for files
$dir = file_get_contents(__DIR__ . '/base');
$files = glob('base/*.*');

// arguments
$city = $argv[1];
$startNumber = $argv[2];

mkdir($city);

foreach($files as $file) {
    $information = exif_read_data($file, 0, true);
    $date = $information['IFD0']['DateTime'];

    rename($file, $city . '/' . $city . '_' . $startNumber . '_' . $date . '.NEF');

    $startNumber++;
}

exit(0);