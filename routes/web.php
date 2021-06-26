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
Route::get('/persona-search',[PersonaController::class,'search'])->name('persona.search');
Route::get('/equipo-search',[EquipoController::class,'search'])->name('equipo.search');
Route::get('/sede-search',[SedeController::class,'search'])->name('sede.search');
Route::get('/encuentro-search',[EncuentroController::class,'search'])->name('encuentro.search');
#endregion

#region get routes
Route::post('/persona-get',[PersonaController::class,'gets'])->name('persona.gets');
Route::post('/equipo-get',[EquipoController::class,'gets'])->name('equipo.gets');
Route::post('/sede-get',[SedeController::class,'gets'])->name('sede.gets');
Route::post('/encuentro-get',[EncuentroController::class,'gets'])->name('encuentro.gets');
#endregion

#region pdf routes
Route::get('/persona-pdf',[PersonaController::class,'downloadPDF'])->name('persona.pdf');
Route::get('/equipo-pdf',[EquipoController::class,'downloadPDF'])->name('equipo.pdf');
Route::get('/sede-pdf',[SedeController::class,'downloadPDF'])->name('sede.pdf');
Route::get('/encuentro-pdf',[EncuentroController::class,'downloadPDF'])->name('encuentro.pdf');
#endregion

#region excel routes
Route::get('/persona-excel',[PersonaController::class,'downloadExcel'])->name('persona.excel');
Route::get('/equipo-excel',[EquipoController::class,'downloadExcel'])->name('equipo.excel');
Route::get('/sede-excel',[SedeController::class,'downloadExcel'])->name('sede.excel');
Route::get('/encuentro-excel',[EncuentroController::class,'downloadExcel'])->name('encuentro.excel');
#endregion

#region encuentro-personas routes
Route::get('encuentro-persona/create/{encuentro}', [EncuentroPersonaController::class,'create'])->name('encuentro-persona.create');
Route::post('encuentro-persona/store/{encuentro}', [EncuentroPersonaController::class,'store'])->name('encuentro-persona.store');
#endregion

#region sede-archivo routes
Route::get('sede-archivo/create/{sede}', [ArchivoController::class,'create'])->name('sede-archivo.create');
Route::post('sede-archivo/store/{sede}', [ArchivoController::class,'store'])->name('sede-archivo.store');
Route::get('sede-archivo/destroy/{archivo}', [ArchivoController::class,'destroy'])->name('sede-archivo.destroy');
#endregion


#region json responses
Route::get('/persona-json',[PersonaController::class,'jsonView'])->name('persona.json-view');
Route::get('/persona-json-role/{role}', [PersonaController::class,'jsonRol'])->name('persona.json-role');
Route::get('/persona-json-sex/{sex}', [PersonaController::class,'jsonSexo'])->name('persona.json-sex');
#endregion

#region estadisticas
Route::get('/estadisticas', [EncuentroPersonaController::class,'statistics'])->name('statistics');
#endregion