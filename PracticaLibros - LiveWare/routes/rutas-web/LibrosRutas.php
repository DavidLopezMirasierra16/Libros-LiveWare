<?php

use App\Http\Controllers\LibrosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LibrosController::class, 'indexWeb'])->name('IndexWeb');

Route::get('/libros', [LibrosController::class, 'index'])->name('indexLibros');

Route::prefix('/libros')->group(function(){

    Route::get('/crear', [LibrosController::class, 'crearFormulario'])->name('fomularioCrearLibro');
    Route::post('/crear', [LibrosController::class, 'crearLibro'])->name('crearLibro');
    Route::get('/editar/{id}', [LibrosController::class, 'editarFormulario'])->name('formularioEditarLibro');
    Route::put('/editar/{id}', [LibrosController::class, 'editarLibro'])->name('editarLibro');
    Route::delete('/eliminar/{id}', [LibrosController::class, 'eliminarLibro'])->name('eliminarLibro');
    
});

?>