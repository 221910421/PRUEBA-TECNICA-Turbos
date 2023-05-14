<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\autoresController;

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

//Ruta para el dashboard de los libros (GET)
Route::get('/libros', function () {
    return view('libros');
})->name('libros');

//Ruta para el dashboard de los autores (GET)
Route::get('/autores', [autoresController::class, 'autores'])->name('autores');

//Ruta para crear un nuevo autor (GET)
Route::get('/autores/nuevo', function () {
    return view('nuevoAutor');
})->name('nuevoAutor');

//Ruta para crear un nuevo autor (POST)
Route::post('/autores/nuevo', [autoresController::class, 'nuevoAutor'])->name('nuevoAutor');

//Ruta para editar un autor (GET)
Route::get('/autores/editar/{id}', [autoresController::class, 'editarAutor'])->name('editarAutor');

//Ruta para editar un autor (POST)
Route::post('/autores/editar/{id}', [autoresController::class, 'actualizarAutor'])->name('actualizarAutor');
