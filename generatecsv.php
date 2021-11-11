<?php

require __DIR__ . '/vendor/autoload.php';

// Open/Create the file if doesn't exist, and give write permission to PHP
$csv = fopen('generated.csv', "w");

// Open a new Redis Connection via Predis
$redis = new \Predis\Client();

// For the first 1 million rows
for($i = 0; $i < 1000000; $i++) {
    // Get the key from redis and decode as to an array.
    $array = json_decode($redis->get('csv.'.$i), true);
    
    // Add new line
    fputcsv($csv, $array);
    
    // CLI Echo
    echo 'Added Row ' . $i . PHP_EOL;
}

// Close the file
fclose($csv);
