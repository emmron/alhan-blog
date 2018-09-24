<?php

use Faker\Generator as Faker;
use Faker\Provider\Base as FakerBase;

$factory->define(App\Image::class, function (Faker $faker) {
    $randomImageId = FakerBase::numberBetween($min = 0, $max = 1084);
    return [
        'file_basename' => 'placeholder',
        'alt_text' => 'Another cat?'
    ];
});
