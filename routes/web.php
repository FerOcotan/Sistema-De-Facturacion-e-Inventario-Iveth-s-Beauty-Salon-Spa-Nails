<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductoController::class, 'index'])->name('indexProducto');

Route::post('/buscar', [ProductoController::class, 'buscar'])->name('buscarProducto');

Route::get('/servicio', [ServicioController::class, 'index'])->name('servicio');

Route::post('/servicio/buscar', [ServicioController::class, 'buscar'])->name('buscarServicio');
