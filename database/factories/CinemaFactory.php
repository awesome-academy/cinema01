<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cinema::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'address' => $faker->address,
        'note' => $faker->text(255),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
