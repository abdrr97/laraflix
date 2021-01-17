<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Season;
use App\Serie;
use Faker\Generator as Faker;

$factory->define(Season::class, function (Faker $faker) {
    return [
        'title' => 'season ' . $faker->randomNumber(),
        'info' => $faker->paragraph,
        'publish_date' => now(),
        'serie_id' => factory(Serie::class)->create()
    ];
});
