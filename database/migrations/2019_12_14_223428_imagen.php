<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Imagen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('ruta');
            $table->string('miniaturaAnuncio');
            $table->bigInteger('anuncio_id')->unsigned()->index();
            $table->foreign('anuncio_id')->references('id')->on('anuncio');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
