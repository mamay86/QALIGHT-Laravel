<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word(32),
        'description' => $faker->sentence(),
    ];
});
