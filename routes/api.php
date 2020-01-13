<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::group(['middleware' => 'cors'], function(){
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
        Route::get('refresh', 'AuthController@refresh');
       /*  Route::get('servicios','ServicioController'); */
       
        Route::group(['middleware' => 'auth:api'], function(){
            Route::get('user', 'AuthController@user');
            Route::post('logout', 'AuthController@logout');
        
        });
    });

});

        

Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'cors'], function(){
        // Users
        Route::get('users', 'UserController@getAll')->middleware('isAdmin');
        Route::get('users/{id}', 'UserController@findUser')->middleware('isAdminOrSelf');
        Route::apiResource('membresias', 'MembresiaController');
        
        
        
        Route::apiResource('membresia_usuario','Membresia_usuarioController');

        Route::delete('anuncios','AnuncioController@destroy');
        Route::put('anuncios','AnuncioController@update');
        Route::post('anuncios','AnuncioController@store');
        Route::post('anuncios/crearAnuncio','AnuncioController@crearAnuncio');

        
        Route::post('paises','PaisController@store');
        Route::get('paises','PaisController@show');
        Route::put('paises','PaisController@update');
        Route::delete('paises','PaisController@destroy'); 
        
        Route::apiResource('departamentos','DepartamentoController');
        Route::apiResource('ciudades','CiudadController');
        
        Route::put('imagenes','ImagenController@update');
        Route::delete('imagenes','ImagenController@destroy');
        
        
        
        
        Route::get('servicios','ServicioController@show'); 
        Route::put('servicios','ServicioController@update'); 
        Route::delete('servicios','ServicioController@destroy'); 
        Route::get('servicios/serviciosPorId/{id}','ServicioController@getServiciosPorId');
        Route::post('servicios','ServicioController@store'); 
        

        /* Route::apiResource('proyectos', 'ProyectoController');
        Route::apiResource('material','MaterialController');
        Route::apiResource('tarea','TareaController');
        Route::apiResource('test','TestController');
        Route::apiResource('escenario','EscenarioController'); */
    });
});

Route::group(['middleware' => 'cors'], function(){
    Route::get('paises','PaisController@index');

    
    Route::get('anuncios','AnuncioController@show');
    Route::get('anuncios','AnuncioController@index');
    Route::get('anunciosHome','AnuncioController@AnunciosHome');

    Route::post('imagenes','ImagenController@store');
    Route::get('imagenes','ImagenController@index');
    Route::get('imagenes','ImagenController@show');

    Route::get('departamentos/departamentosPorPais/{id}','DepartamentoController@departamentosPorPais');
    Route::get('municipios/municipiosPorDepartamento/{id}','CiudadController@municipiosPorDepartamento');
});










