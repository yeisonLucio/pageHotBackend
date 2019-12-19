<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Membresia;
use Faker\Generator as Faker;

$factory->define(Membresia::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'valor' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
