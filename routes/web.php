<?php

use App\Http\Controllers\EncuentroPersonaController;
use App\Http\Controllers\EncuentroController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SedeController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Inertia;

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
    return view('main');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/inicio', function () {
    return view('dashboard');
})->name('inicio');

#endregion

#region resources routes
Route::resource('persona', PersonaController::class);
Route::resource('equipo', EquipoController::class);
Route::resource('sede', SedeController::class);
Route::resource('encuentro', EncuentroController::class);
#endregion

#region search routes
Route::get ('/persona-search',[PersonaController::class,'search']);
Route::get ('/equipo-search',[EquipoController::class,'search']);
Route::get ('/sede-search',[SedeController::class,'search']);
Route::get ('/encuentro-search-id',[EncuentroController::class,'search_id']);
#endregion

#region get routes
Route::get ('/persona-get',[PersonaController::class,'gets']);
Route::get ('/equipo-get',[EquipoController::class,'gets']);
Route::get ('/sede-get',[SedeController::class,'gets']);
Route::get ('/encuentro-get-id',[EncuentroController::class,'gets_id']);
#endregion

#region pdf routes
Route::get('/persona-pdf',[PersonaController::class,'downloadPDF']);
Route::get('/equipo-pdf',[EquipoController::class,'downloadPDF']);
Route::get('/sede-pdf',[SedeController::class,'downloadPDF']);
Route::get('/encuentro-pdf',[EncuentroController::class,'downloadPDF']);
#endregion

#region excel routes
Route::get('/persona-excel',[PersonaController::class,'downloadExcel']);
Route::get('/equipo-excel',[EquipoController::class,'downloadExcel']);
Route::get('/sede-excel',[SedeController::class,'downloadExcel']);
Route::get('/encuentro-excel',[EncuentroController::class,'downloadExcel']);
#endregion

#region encuentro-personas routes
Route::get('encuentro-persona/create/{encuentro}', [EncuentroPersonaController::class,'create']);
Route::post('encuentro-persona/store/{encuentro}', [EncuentroPersonaController::class,'store'])->name('encuentro-persona.store');
#endregion

#region sede-archivo routes
Route::get('sede-archivo/create/{sede}', [ArchivoController::class,'create']);
Route::post('sede-archivo/store/{sede}', [ArchivoController::class,'store'])->name('sede-archivo.store');
Route::get('sede-archivo/delete/{archivo}', [ArchivoController::class,'destroy']);
#endregion

