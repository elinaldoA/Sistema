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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('login','Sistema\Api\V1\Admin\AuthController@login');
    # planos...
    Route::apiResource('planos', 'Sistema\Api\V1\PlanosController');
    Route::get('planos', 'Sistema\Api\V1\PlanosController@index');
    Route::post('planos/{plano}', 'Sistema\Api\V1\PlanosController@store');
    Route::get('planos/{plano}', 'Sistema\Api\V1\PlanosController@show');
    Route::put('planos/{plano}', 'Sistema\Api\V1\PlanosController@update');
    Route::delete('planos/{plano}', 'Sistema\Api\V1\PlanosController@destroy');
    # categorias...
    Route::apiResource('categorias', 'Sistema\Api\V1\CategoriasController');
    Route::get('categorias', 'Sistema\Api\V1\CategoriasController@index');
    Route::post('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@store');
    Route::get('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@show');
    Route::put('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@update');
    Route::delete('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@destroy');
    # Empresas...
    Route::apiResource('empresas', 'Sistema\Api\V1\EmpresasController');
    Route::get('empresas', 'Sistema\Api\V1\EmpresasController@index');
    Route::post('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@store');
    Route::get('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@show');
    Route::put('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@update');
    Route::delete('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@destroy');
    # Clientes...
    Route::apiResource('clientes', 'Sistema\Api\V1\ClientesController');
    Route::get('clientes', 'Sistema\Api\V1\ClientesController@index');
    Route::post('clientes/{cliente}', 'Sistema\Api\V1\ClientesController@store');
    Route::get('clientes/{cliente}', 'Sistema\Api\V1\ClientesController@show');
    Route::put('clientes/{cliente}', 'Sistema\Api\V1\ClientesController@update');
    Route::delete('clientes/{cliente}', 'Sistema\Api\V1\ClientesController@destroy');
});
