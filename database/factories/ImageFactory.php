<?php

use Faker\Generator as Faker;
use Faker\Provider\Base as FakerBase;

$factory->define(App\Image::class, function (Faker $faker) {
    $randomImageId = FakerBase::numberBetween($min = 0, $max = 1084);
    return [
        'small' => 'https://picsum.photos/320/320?image=' . $randomImageId,
        'medium' => 'https://picsum.photos/480/300?image=' . $randomImageId,
        'large' => 'https://picsum.photos/800/600?image=' . $randomImageId,
        'alt' => 'Another cat?'
    ];
});