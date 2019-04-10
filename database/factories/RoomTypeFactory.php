<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Room_type::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'note' => $faker->text(255),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
