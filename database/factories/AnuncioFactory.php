<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Anuncio;
use Faker\Generator as Faker;

$factory->define(Anuncio::class, function (Faker $faker) {
    return [
        //
        'titulo' => $faker->name,
        'descripcion' =>$faker->text($maxNbChars = 100),
        'usuario_id' => function(){
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});
