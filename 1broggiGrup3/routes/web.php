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
Route::get('/incidencia', function () {
    return view('paginas.incidencias.index');
});
Route::get('/formIncidencia', function () {
    return view('paginas.incidencias.form');
});
Route::get('/formIncidencia2', function () {
    return view('paginas.incidencias.form2');
});

Route::get('/formIncidencia3', function () {
    return view('paginas.incidencias.form3');
});

Route::get('/formIncidencia4', function () {
    return view('paginas.incidencias.form4');
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
