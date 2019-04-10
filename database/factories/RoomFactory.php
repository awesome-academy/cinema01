<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Room::class, function (Faker $faker) {
    return [
        'cinema_id' => $faker->numberBetween($min = 1, $max = 25),
        'room_type_id' => $faker->numberBetween($min = 1, $max = 25),
        'name' => $faker->word,
        'note' => $faker->text(255),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
