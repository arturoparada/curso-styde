<?php

use Faker\Generator as Faker;

$factory->define(\App\Articles::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->sentence(1, false),
        'precio' => rand(50,1000),
        'existencia' => rand(0,100),
    ];
});
