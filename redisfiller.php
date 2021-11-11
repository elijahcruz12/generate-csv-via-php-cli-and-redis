<?php

require __DIR__ . '/vendor/autoload.php';

// Using faker to generate the data.
$faker = Faker\Factory::create();


// Open Redis connection via Predis.
$redis = new \Predis\Client();

// For the first 1 million keys
for($i = 0; $i < 1000000; $i++) {

    // Create a faker array.
    $array = [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'tz' => $faker->timezone,
        'random_numer' => random_int(0, 1000000),
        'random_string' => \Illuminate\Support\Str::random(random_int(16,256))
    ];
    
    // Json encode the array so we can store as one key per row.
    $json = json_encode($array);

    // Add to redis
    $redis->set('csv.'.$i, $json);
    
    // CLI Output
    echo "Added key csv." . $i . PHP_EOL;
}
