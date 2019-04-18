<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Vote::class, function (Faker $faker) {
    return [
        'movie_id' => $faker->numberBetween($min = 1, $max = 25),
        'user_id' => $faker->numberBetween($min = 1, $max = 25),
        'point' => $faker->numberBetween($min = 1, $max = 5),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
