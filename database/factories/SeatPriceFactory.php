<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Seat_price::class, function (Faker $faker) {
    return [
        'room_type_id' => $faker->numberBetween($min = 1, $max = 25),
        'seat_type_id' => $faker->numberBetween($min = 1, $max = 25),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 10, $max = NULL),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
