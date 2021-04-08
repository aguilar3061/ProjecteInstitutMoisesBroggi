<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/user', function () {
    return view('plantillas.UserMod');
});
Route::get('/admin', function () {
    return view('plantillas.AdminMod');
});
Route::get('/modificar_alertante', function () {
    return view('plantillas.AddModifyAlertant');
});
Route::get('/modificar_recurso', function () {
    return view('plantillas.AddModifyRecurso');
});
