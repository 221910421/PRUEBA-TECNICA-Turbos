<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\autoresController;
use App\Http\Controllers\editorialesController;

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

//Ruta para eliminar un autor (GET)
Route::get('/autores/eliminar/{id}', [autoresController::class, 'eliminarAutor'])->name('eliminarAutor');

//Ruta para buscar un autor (POST)
Route::post('/autores/buscar', [autoresController::class, 'buscarAutor'])->name('buscarAutor');

//Ruta para el dashboard de las editoriales (GET)
Route::get('/editoriales', [editorialesController::class, 'editoriales'])->name('editoriales');

//Ruta para crear una nueva editorial (GET)
Route::get('/editoriales/nuevo', function () {
    return view('nuevaEditorial');
})->name('nuevaEditorial');

//Ruta para crear una nueva editorial (POST)
Route::post('/editoriales/nuevo', [editorialesController::class, 'nuevaEditorial'])->name('nuevaEditorial');

//Ruta para editar una editorial (GET)
Route::get('/editoriales/editar/{id}', [editorialesController::class, 'editarEditorial'])->name('editarEditorial');

//Ruta para editar una editorial (POST)
Route::post('/editoriales/editar/{id}', [editorialesController::class, 'actualizarEditorial'])->name('actualizarEditorial');

//Ruta para eliminar una editorial (GET)
Route::get('/editoriales/eliminar/{id}', [editorialesController::class, 'eliminarEditorial'])->name('eliminarEditorial');

//Ruta para buscar una editorial (POST)
Route::post('/editoriales/buscar', [editorialesController::class, 'buscarEditorial'])->name('buscarEditorial');
