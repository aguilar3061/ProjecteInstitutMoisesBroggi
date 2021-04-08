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
    return view('paginas.Admin.UserMod');
});
Route::get('/admin', function () {
    return view('paginas.Admin.AdminMod');
});
Route::get('/modificar_alertante', function () {
    return view('paginas.Admin.AddModifyAlertant');
});
Route::get('/modificar_recurso', function () {
    return view('paginas.Admin.AddModifyRecurso');
});
Route::get('/formRecursIncidencia', function () {
    return view('paginas.Recurso.formRecusIncicencia');
});
Route::get('/infoRecursEincidencia', function () {
    return view('paginas.Recurso.infoRecursEincidencia');
});

