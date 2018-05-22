<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->lastName,
        'director' => $faker->firstName,
        'imageUrl' => $faker->url,
        'duration' => $faker->numberBetween(60,220),
        'releaseDate' => $faker->dateTime,
        'genre' => $faker->randomElement(["Action", "Mistery", "Comedy", "Horror", "Fantastic"], $allowDuplicates = true)
    ];
});
