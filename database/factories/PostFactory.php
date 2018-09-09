<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence();
    return [
        'slug' => str_slug($title, '-'),
        'title' => $title,
        'body' => $faker->text($maxNbChars = 10000),
        'published' => $faker->boolean($chanceOfGettingTrue = 20),
    ];
});
