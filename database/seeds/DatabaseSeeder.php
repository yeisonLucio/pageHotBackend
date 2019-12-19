<?php

use App\Models\Anuncio;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Imagen;
use App\Models\Membresia_usuario;
use App\Models\User;
use App\Models\Pais;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory(Pais::class,1)->create();
        /* factory(Departamento::class,1)->create();
        factory(Ciudad::class,1)->create(); */
        factory(User::class,1)->create();
        //factory(Anuncio::class,1)->create();
        factory(Imagen::class,1)->create();
        factory(Servicio::class,1)->create();
        factory(Membresia_usuario::class,1)->create();

 



    }
}
