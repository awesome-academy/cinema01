<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Item::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'note' => $faker->text(255),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
