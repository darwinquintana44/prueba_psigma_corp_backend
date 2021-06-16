<?php

use App\Http\Controllers\Transportes\TransporteTrConductoresController;
use App\Http\Controllers\Globales\GlobalTrPaisesController;
use App\Http\Controllers\Globales\GlobalTrDepartamentosController;
use App\Http\Controllers\Globales\GlobalTrMunicipiosController;
use App\Http\Controllers\Transportes\TransporteTrSupervisoresController;
use App\Http\Controllers\Transportes\TransporteTdSuperConducController;
use App\Http\Controllers\Transportes\TransporteTmVehiculosController;
use App\Http\Controllers\Transportes\TransporteTdVehiConducController;
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
    Route::get('listado', [GlobalTrDepartamentosController::class, 'index']);
    Route::get('listado/{id}', [GlobalTrDepartamentosController::class, 'show']);
});
// GRUPO DE RUTAS PARA GLOBAL_TR_MUNICIPIOS
Route::prefix('municipio')->group(function ($router){
    Route::get('listado', [GlobalTrMunicipiosController::class, 'index']);
    Route::get('listado/{id}', [GlobalTrMunicipiosController::class, 'show']);
});
// GRUPO DE RUTAS PARA TRANSPORTE_TR_CONDUCTORES
Route::prefix('conductor')->group(function ($router){
    Route::get('listado', [TransporteTrConductoresController::class, 'index']);
    Route::get('listado/{id}', [TransporteTrConductoresController::class, 'show']);
    Route::post('', [TransporteTrConductoresController::class, 'create']);
    Route::patch('', [TransporteTrConductoresController::class, 'update']);
    Route::delete('{id}', [TransporteTrConductoresController::class, 'destroy']);

    Route::get('{id}/supervisor', [TransporteTrConductoresController::class, 'supervisorAsignado']);
    Route::get('{id}/vehiculo', [TransporteTrConductoresController::class, 'vehiculoAsignado']);
});
// GRUPO DE RUTAS PARA TRANSPORTE_TR_SUPERVISORES
Route::prefix('supervisor')->group(function ($router){
    Route::get('listado', [TransporteTrSupervisoresController::class, 'index']);
    Route::get('listado_general', [TransporteTrSupervisoresController::class, 'listadoGeneral']);
});
// GRUPO DE RUTAS PARA TRANSPORTE_TD_SUPER_CONDUC
Route::prefix('asigna_supervisor')->group(function ($router){
    Route::post('', [TransporteTdSuperConducController::class, 'store']);
});
// GRUPO DE RUTAS PARA TRANSPORTE_TM_VEHICULOS
Route::prefix('vehiculo')->group(function ($router){
    Route::get('listado_por_id', [TransporteTmVehiculosController::class, 'datosOrdenadosPorId']);
    Route::get('listado_por_descripcion', [TransporteTmVehiculosController::class, 'datosOrdenadosPorDescripcion']);
});
// GRUPO DE RUTAS PARA TRANSPORTE_TM_VEHICULOS
Route::prefix('asigna_vehiculo')->group(function ($router){
    Route::get('listado', [TransporteTmVehiculosController::class, 'datosOrdenadosPorId']);
    Route::post('', [TransporteTdVehiConducController::class, 'store']);
});
