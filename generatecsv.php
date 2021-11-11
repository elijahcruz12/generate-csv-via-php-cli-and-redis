<?php

require __DIR__ . '/vendor/autoload.php';

$csv = fopen('generated.csv', "w");

$redis = new \Predis\Client();

for($i = 0; $i <= 1000000; $i++) {
    $array = json_decode($redis->get('csv.'.$i), true);
    fputcsv($csv, $array);
    echo 'Added Row ' . $i . PHP_EOL;
}

fclose($csv);