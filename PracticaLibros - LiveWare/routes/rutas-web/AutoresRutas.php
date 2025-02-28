<?php

use App\Http\Controllers\AutoresController;
use Illuminate\Support\Facades\Route;

Route::get('/autores', [AutoresController::class, 'index'])->name('indexAutores');

Route::prefix('/autores')->group(function(){

    Route::get('/crear', [AutoresController::class, 'crearFormulario'])->name('formularioCrearAutor');
    Route::post('/crear', [AutoresController::class, 'crearAutor'])->name('crearAutor');
    Route::get('/editar/{id}', [AutoresController::class, 'editarFormulario'])->name('formularioEditarAutor');
    Route::put('/editar/{id}', [AutoresController::class, 'editarAutor'])->name('editarAutor');
    Route::delete('/eliminar/{id}', [AutoresController::class, 'eliminarAutor'])->name('eliminarAutor');

})

?>