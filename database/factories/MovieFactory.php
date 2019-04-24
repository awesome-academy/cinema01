<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => $faker->word,
        'producer' => $faker->name,
        'country' => $faker->country,
        'cast' => $faker->word,
        'day_start' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->numberBetween($min = 10, $max = 180),
        'content' => $faker->text(255),
        'directors' => $faker->name,
        'image' => $faker->imageUrl($width = 500, $height = 300, 'cats'),
        'trailer' => $faker->text(255),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        'status' => $faker->numberBetween(0, 1),
    ];
});
