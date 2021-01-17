<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Episode;
use App\Season;
use Faker\Generator as Faker;

$factory->define(Episode::class, function (Faker $faker) {
    return [
        'title' => 'episode ' . $faker->randomNumber(),
        'vimeo_url' => 'https://player.vimeo.com/video/147467503',
        'publish_date' => now(),
        'season_id' => factory(Season::class)->create(),
    ];
});
