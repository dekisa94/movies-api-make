<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'director' => $faker->firstName,
        'imageUrl' => $faker->url,
        'duration' => $faker->randomDigit,
        'releaseDate' => $faker->dateTime,
        'genre' => $faker->name
    ];
});
