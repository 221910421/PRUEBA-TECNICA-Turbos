<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\autoresController;
use App\Http\Controllers\editorialesController;
use App\Http\Controllers\generosController;
use App\Http\Controllers\librosController;

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

route::get('/', [librosController::class, 'libros'])->name('index');

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

//Ruta para el dashboard de los autores (GET)
Route::get('/autores', [autoresController::class, 'autores'])->name('autores');

//Ruta para crear un nuevo autor (GET)
Route::get('/autores/nuevo', function () {
    return view('autores.nuevoAutor');
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
    return view('editoriales.nuevaEditorial');
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

//Ruta para el dashboard de los generos (GET)
Route::get('/generos', [generosController::class, 'generos'])->name('generos');

//Ruta para crear un nuevo genero (GET)
Route::get('/generos/nuevo', function () {
    return view('generos.nuevoGenero');
})->name('nuevoGenero');

//Ruta para crear un nuevo genero (POST)
Route::post('/generos/nuevo', [generosController::class, 'nuevoGenero'])->name('nuevoGenero');

//Ruta para editar un genero (GET)
Route::get('/generos/editar/{id}', [generosController::class, 'editarGenero'])->name('editarGenero');

//Ruta para editar un genero (POST)
Route::post('/generos/editar/{id}', [generosController::class, 'actualizarGenero'])->name('actualizarGenero');

//Ruta para eliminar un genero (GET)
Route::get('/generos/eliminar/{id}', [generosController::class, 'eliminarGenero'])->name('eliminarGenero');

//Ruta para buscar un genero (POST)
Route::post('/generos/buscar', [generosController::class, 'buscarGenero'])->name('buscarGenero');

//Ruta para dashboard de los libros (GET)
Route::get('/libros', [librosController::class, 'libros'])->name('libros');

//Ruta para crear un nuevo libro (GET)
Route::get('/libros/nuevo', [librosController::class, 'nuevoLibro'])->name('nuevoLibro');

//Ruta para crear un nuevo libro (POST)
Route::post('/libros/nuevo', [librosController::class, 'guardarLibro'])->name('guardarLibro');

//Ruta para ver la informacion de un libro (GET)
Route::get('/libros/ver/{id}', [librosController::class, 'verLibro'])->name('verLibro');

//Ruta para editar un libro (GET)
Route::get('/libros/editar/{id}', [librosController::class, 'editarLibro'])->name('editarLibro');

//Ruta para editar un libro (POST)
Route::post('/libros/editar/{id}', [librosController::class, 'actualizarLibro'])->name('actualizarLibro');

//Ruta para eliminar un libro (GET)
Route::get('/libros/eliminar/{id}', [librosController::class, 'eliminarLibro'])->name('eliminarLibro');

//Ruta para buscar un libro (POST)
Route::post('/libros/buscar', [librosController::class, 'buscarLibro'])->name('buscarLibro');
