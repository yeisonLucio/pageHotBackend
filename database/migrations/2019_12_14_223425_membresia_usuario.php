<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MembresiaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresia_usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('nombre');
            $table->integer('estado');
            $table->timestamps();
            $table->bigInteger('usuario_id')->unsigned()->index();
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->bigInteger('membresia_id')->unsigned()->index();
            $table->foreign('membresia_id')->references('id')->on('membresia');
            

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
