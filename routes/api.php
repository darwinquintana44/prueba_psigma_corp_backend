<?php

use App\Http\Controllers\Transportes\TransporteTrConductoresController;
use App\Http\Controllers\Globales\GlobalTrPaisesController;
use App\Http\Controllers\Globales\GlobalTrDepartamentosController;
use App\Http\Controllers\Globales\GlobalTrMunicipiosController;
use App\Http\Controllers\Transportes\TransporteTrSupervisoresController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// GRUPO DE RUTAS PARA GLOBAL_TR_PAISES
Route::prefix('pais')->group(function ($router){
    Route::get('listado', [GlobalTrPaisesController::class, 'index']);
});
// GRUPO DE RUTAS PARA GLOBAL_TR_DEPARTAMENTOS
Route::prefix('departamento')->group(function ($router){
    Route::get('listado/{id}', [GlobalTrDepartamentosController::class, 'show']);
});
// GRUPO DE RUTAS PARA GLOBAL_TR_MUNICIPIOS
Route::prefix('municipio')->group(function ($router){
    Route::get('listado/{id}', [GlobalTrMunicipiosController::class, 'show']);
});
// GRUPO DE RUTAS PARA TRANSPORTE_TR_CONDUCTORES
Route::prefix('conductor')->group(function ($router){
    Route::get('listado', [TransporteTrConductoresController::class, 'index']);
    Route::get('listado/{id}', [TransporteTrConductoresController::class, 'show']);
    Route::post('', [TransporteTrConductoresController::class, 'create']);
    Route::patch('', [TransporteTrConductoresController::class, 'update']);
    Route::delete('{id}', [TransporteTrConductoresController::class, 'destroy']);
});
// GRUPO DE RUTAS PARA TRANSPORTE_TR_SUPERVISORES
Route::prefix('supervisor')->group(function ($router){
    Route::get('listado', [TransporteTrSupervisoresController::class, 'index']);
});
