<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

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

//dd(User::first()->toArray());

Route::get('/', function () {
    return view('welcome');
});

Route::get('choferes/pdf', [App\Http\Controllers\ChofereController::class, 'pdf'])->name('choferes.pdf');

Auth::routes();

Route::resource('choferes', App\Http\Controllers\ChofereController::class);
Route::resource('multas', App\Http\Controllers\MultaController::class);
Route::resource('rutas', App\Http\Controllers\RutaController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
//
Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
Route::resource('socios', App\Http\Controllers\SocioController::class);

Route::resource('vehiculos', App\Http\Controllers\VehiculoController::class);
Route::resource('gruporutas', App\Http\Controllers\GruporutaController::class);
Route::resource('trufis', App\Http\Controllers\TrufiController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

