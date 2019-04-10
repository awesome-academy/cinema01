<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Showtime::class, function (Faker $faker) {
    return [
        'movie_id' => $faker->numberBetween($min = 1, $max = 25),
        'room_id' => $faker->numberBetween($min = 1, $max = 25),
        'timestar' => $faker->date($format = 'Y-m-d', $min = 'now'),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
