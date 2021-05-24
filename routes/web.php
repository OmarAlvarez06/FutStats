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

//Route::get('persona', [PersonaController::class, 'index']);
//Route::get('persona/create', [PersonaController::class, 'create']);

Route::resource('persona', PersonaController::class);
Route::resource('equipo', EquipoController::class);
Route::resource('sede', SedeController::class);