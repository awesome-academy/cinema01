<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Bill_detail::class, function (Faker $faker) {
    return [
        'bill_id' => $faker->numberBetween(1, 25),
        'item_id' => $faker->numberBetween(1, 25),
        'quantity' => $faker->numberBetween($min = 1, $max = 200),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
