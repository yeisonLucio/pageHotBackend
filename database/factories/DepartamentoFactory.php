<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Departamento;
use Faker\Generator as Faker;

$factory->define(Departamento::class, function (Faker $faker) {
    return [
        'nombre' => 'Cauca',
        'pais_id' => function(){
            return factory(App\Models\Pais::class)->create()->id;
        }
    ];
});
