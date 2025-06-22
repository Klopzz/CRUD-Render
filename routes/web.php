<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/libros/crear', [LibrosController::class,'crear'])->name('libros.crear');   

Route::post('/libros/store', [LibrosController::class,'store'])->name('libros.store');   

Route::get('/libros/leer', [LibrosController::class,'leer'])->name('libros.leer');   

Route::put('/libros/{libro}', [LibrosController::class,'update'])->name('libros.update');   

Route::delete('/libros/{libro}', [LibrosController::class,'destroy'])->name('libros.destroy');



