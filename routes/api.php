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

        /* Route::apiResource('proyectos', 'ProyectoController');
        Route::apiResource('material','MaterialController');
        Route::apiResource('tarea','TareaController');
        Route::apiResource('test','TestController');
        Route::apiResource('escenario','EscenarioController'); */
    });
});