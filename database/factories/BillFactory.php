<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bill::class, function (Faker $faker) {
    return [
        'create_day' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'total' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'user_id' => $faker->numberBetween($min = 1, $max = 25),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
