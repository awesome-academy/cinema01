<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Seat_col::class, function (Faker $faker) {
    return [
        'seat_row_id' => $faker->numberBetween($min = 1, $max = 25),
        'status' => $faker->numberBetween($min = 1, $max = 20),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
