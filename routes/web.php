<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para gestionar usuarios
Route::resource('usuarios', 'UsuarioController');

// Rutas para gestionar libros
Route::resource('libros', 'LibroController');

// Rutas para gestionar reseñas
Route::resource('resenas', 'ReseñaController');

// Rutas para gestionar autores
Route::resource('autores', 'AutorController');

// Rutas para gestionar categorías
Route::resource('categorias', 'CategoriaController');

