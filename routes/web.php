<?php
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SedeController;
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
    return view('presentation');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('persona', PersonaController::class);
Route::resource('equipo', EquipoController::class);
Route::resource('sede', SedeController::class);
Route::get('/persona-pdf',[PersonaController::class,'downloadPDF']);
Route::get('/equipo-pdf',[EquipoController::class,'downloadPDF']);
Route::get('/sede-pdf',[SedeController::class,'downloadPDF']);