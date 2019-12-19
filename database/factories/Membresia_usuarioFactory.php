<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Membresia_usuario;
use Faker\Generator as Faker;

$factory->define(Membresia_usuario::class, function (Faker $faker) {
    return [
        'estado' => '1',
        'usuario_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        },
        'membresia_id' => function(){
            return factory(App\Models\Membresia::class)->create()->id;
        }

    ];
});
