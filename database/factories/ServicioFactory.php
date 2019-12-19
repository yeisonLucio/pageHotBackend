<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Servicio;
use Faker\Generator as Faker;

$factory->define(Servicio::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
        'usuario_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});
