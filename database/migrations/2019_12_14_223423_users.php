<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('userName');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telefono');
            $table->string('edad');
            $table->string('sexo');
            $table->string('tipo');
            $table->bigInteger('pais_id')->unsigned()->index();
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->bigInteger('departamento_id')->unsigned()->index();
            $table->foreign('departamento_id')->references('id')->on('departamento');
            $table->bigInteger('ciudad_id')->unsigned()->index();
            $table->foreign('ciudad_id')->references('id')->on('ciudad');
            $table->string('rol')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
