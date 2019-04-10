<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Ticket::class, function (Faker $faker) {
    return [
        'bill_id' => $faker->numberBetween($min = 1, $max = 25),
        'seat_col_id' => $faker->numberBetween($min = 1, $max = 25),
        'showtime_id' => $faker->numberBetween($min = 1, $max = 25),
        'code' => $faker->word,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
