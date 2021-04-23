<?php
use App\Http\Controllers\API\AfectatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\IncidenciaController;
use App\Http\Controllers\API\RecursController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('incidencia', IncidenciaController::class);

Route::apiResource('afectats', AfectatsController::class);

Route::apiResource('recurs', RecursController::class);

