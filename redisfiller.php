<?php

require __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

$redis = new \Predis\Client();

for($i = 0; $i <= 1000000; $i++) {
    $array = [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'tz' => $faker->timezone,
        'random_numer' => random_int(0, 1000000),
        'random_string' => \Illuminate\Support\Str::random(random_int(16,256))
    ];

    $json = json_encode($array);

    $redis->set('csv.'.$i, $json);
    echo "Added key csv." . $i . PHP_EOL;
}