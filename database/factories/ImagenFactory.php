<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Imagen;
use Faker\Generator as Faker;

$factory->define(Imagen::class, function (Faker $faker) {
    return [
        'ruta' => $faker->imageUrl($width = 640, $height = 480),
        'miniaturaAnuncio' =>'1',
        'anuncio_id' => function(){
            return factory(App\Models\Anuncio::class)->create()->id;
        }
    ];
});
