<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Seat_row::class, function (Faker $faker) {
    return [
        'room_id' => $faker->numberBetween($min = 1, $max = 25),
        'seat_type_id' => $faker->numberBetween($min = 1, $max = 25),
        'row_name' => $faker->word,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
