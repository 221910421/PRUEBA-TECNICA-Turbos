<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuariosController;

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

route::get('/', function () {
    return view('login');
});

//Ruta para el login de los usuarios (GET)
Route::get('/login', function () {
    return view('login');
})->name('login');

//Ruta para el login de los usuarios
Route::post('/login', [usuariosController::class, 'login'])->name('login');

//Ruta para el registro de los usuarios (GET)
Route::get('/registro', function () {
    return view('registro');
})->name('registro');

//Ruta para el registro de los usuarios (POST)
Route::post('/registro', [usuariosController::class, 'registro'])->name('registro');

//Ruta para el dashboard de los usuarios (GET)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

