<?php

use App\Http\Controllers\EncuentroController;
use App\Http\Controllers\PersonaController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/inicio', function () {
    return view('presentation');
})->name('inicio');

Route::resource('persona', PersonaController::class);
Route::resource('equipo', EquipoController::class);
Route::resource('sede', SedeController::class);
Route::resource('encuentro', EncuentroController::class);

Route::get ('/persona-search',[PersonaController::class,'search']);
Route::get ('/equipo-search',[EquipoController::class,'search']);
Route::get ('/sede-search',[SedeController::class,'search']);
Route::get ('/encuentro-search-id',[EncuentroController::class,'search_id']);
Route::get ('/encuentro-search-team',[EncuentroController::class,'search_team']);

Route::get ('/persona-get',[PersonaController::class,'gets']);
Route::get ('/equipo-get',[EquipoController::class,'gets']);
Route::get ('/sede-get',[SedeController::class,'gets']);
Route::get ('/encuentro-get-id',[EncuentroController::class,'gets_id']);
Route::get ('/encuentro-get-team',[EncuentroController::class,'gets_team']);

Route::get('/persona-pdf',[PersonaController::class,'downloadPDF']);
Route::get('/equipo-pdf',[EquipoController::class,'downloadPDF']);
Route::get('/sede-pdf',[SedeController::class,'downloadPDF']);
Route::get('/encuentro-pdf',[EncuentroController::class,'downloadPDF']);

