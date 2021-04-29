<?php
use App\Models\Recurs;
use App\Models\Alertant;
use App\Models\Municipi;
use App\Models\Tipus_recurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SexeController;
use App\Http\Controllers\RecursController;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\AfectatController;
use App\Http\Controllers\ComarcaController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\AlertantController;
use App\Http\Controllers\informacionRecurso;
use App\Http\Controllers\MunicipiController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\TipusRecursController;
use App\Http\Controllers\TipusAlertantController;
use App\Http\Controllers\TipusIncidenciaController;














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
// Route::get('/incidencia', function () {
//     return view('paginas.incidencias.index');
// });
Route::get('/login',function(){
    return view('paginas.logIn.index');
})->name('login');

Route::post('/login', [UserLogController::class, 'login'] );

Route::get('/logout', [UserLogController::class, 'logout']);

Route::middleware(['auth','admin'])->group(function () {
        Route::get('/administrador', function () {
           return view('paginas.Admin.paginaPrincipal');
        });

        Route::get('/user', function () {
            return view('paginas.Admin.UserMod');
        });
        Route::get('/admin', function () {
            return view('paginas.Admin.AdminMod');
        });
        Route::get('/modificar_recurso', function () {
            return view('paginas.Admin.AddModifyRecurso');
       });
       Route::get('/modificar_alertante', function () {
        return view('paginas.Admin.AddModifyAlertant');
        });
        Route::resource('afectat',                  AfectatController::class);
        Route::resource('alertant',                 AlertantController::class);
        Route::resource('comarca',                  ComarcaController::class);
        Route::resource('incidencia',               IncidenciaController::class);
        Route::resource('municipi',                 MunicipiController::class);
        Route::resource('provincia',                ProvinciaController::class);
        Route::resource('recurs',                   RecursController::class);
        Route::resource('rol',                      RolController::class);
        Route::resource('sexe',                     SexeController::class);
        Route::resource('tipus_alertant',           TipusAlertantController::class);
        Route::resource('tipus_incidencia',         TipusIncidenciaController::class);
        Route::resource('tipus_recurs',             TipusRecursController::class);
        Route::resource('usuari',                   UsuariController::class);
     });

     Route::middleware(['auth', 'recurs'])->group(function () {

        Route::get('/recurso', [informacionRecurso::class,'index']);

     });

     Route::middleware(['auth', 'user'])->group(function () {
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
        Route::get('/videos', function (){
            return view ('paginas.videos.indexVue');
        });
        Route::get('/crearIncidencia',[IncidenciaController::class,'index']);
     });

