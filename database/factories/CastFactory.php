<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cast;
use Faker\Generator as Faker;

$factory->define(Cast::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph
    ];
});
