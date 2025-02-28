<?php

use App\Http\Controllers\GenerosController;
use Illuminate\Support\Facades\Route;

Route::get('/generos', [GenerosController::class, 'index'])->name('indexGeneros');

Route::prefix('/generos')->group(function(){

    Route::get('/crear', [GenerosController::class, 'crearFormulario'])->name('fomularioCrearGenero');
    Route::post('/crear', [GenerosController::class, 'crearGenero'])->name('crearGenero');
    Route::get('/editar/{id}', [GenerosController::class, 'editarFormulario'])->name('formularioEditarGenero');
    Route::put('/editar/{id}', [GenerosController::class, 'editarGenero'])->name('editarGenero');
    Route::delete('/eliminar/{id}', [GenerosController::class, 'eliminarGenero'])->name('eliminarGenero');

});

?>