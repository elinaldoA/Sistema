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
    # planos...
    Route::apiResource('planos', 'Sistema\Api\V1\PlanosController');
    Route::get('planos', 'Sistema\Api\V1\PlanosController@index');
    Route::post('planos/{plano}', 'Sistema\Api\V1\PlanosController@store');
    Route::get('planos/{plano}', 'Sistema\Api\V1\PlanosController@show');
    Route::put('planos/{plano}', 'Sistema\Api\V1\PlanosController@update');
    Route::delete('planos/{plano}', 'Sistema\Api\V1\PlanosController@delete');
    # categorias...
    Route::apiResource('categorias', 'Sistema\Api\V1\CategoriasController');
    Route::get('categorias', 'Sistema\Api\V1\CategoriasController@index');
    Route::post('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@store');
    Route::get('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@show');
    Route::put('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@update');
    Route::delete('categorias/{categoria}', 'Sistema\Api\V1\CategoriasController@delete');
    # Empresas...
    Route::apiResource('empresas', 'Sistema\Api\V1\EmpresasController');
    Route::get('empresas', 'Sistema\Api\V1\EmpresasController@index');
    Route::post('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@store');
    Route::get('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@show');
    Route::put('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@update');
    Route::delete('empresas/{empresa}', 'Sistema\Api\V1\EmpresasController@delete');
});
