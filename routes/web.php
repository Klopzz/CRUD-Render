<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;

Route::get('/', [LibrosController::class, 'leer'])->name('inicio');

Route::get('/libros/crear', [LibrosController::class,'crear'])->name('libros.crear');   

Route::post('/libros/guardar', [LibrosController::class,'guardar'])->name('libros.guardar');   

Route::get('/libros/leer', [LibrosController::class,'leer'])->name('libros.leer');   

Route::put('/libros/{libro}', [LibrosController::class,'actualizar'])->name('libros.actualizar');   

Route::delete('/libros/{libro}', [LibrosController::class,'borrar'])->name('libros.borrar');



