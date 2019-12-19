<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'edad' => $faker->randomDigit,
        'sexo' => 0,
        'tipo' => 0,
        'telefono' => "123456789",
        'rol' => '1',
        'pais_id' => function(){
            return factory(App\Models\Pais::class)->create()->id;
        },
        'departamento_id' => function(){
            return factory(App\Models\Departamento::class)->create()->id;
        },
        'ciudad_id' => function(){
            return factory(App\Models\Ciudad::class)->create()->id;
        }


    ];
});
