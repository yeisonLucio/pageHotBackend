<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ciudad;
use Faker\Generator as Faker;

$factory->define(Ciudad::class, function (Faker $faker) {
    return [
        'nombre' => 'Popayán',
        'departamento_id' => function(){
            return factory(App\Models\Departamento::class)->create()->id;
        }
    ];
});
