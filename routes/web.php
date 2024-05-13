<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('inicioSesion');

Route::get('/logout', [LoginController::class, 'logout'])->name('cerrarSesion');

Route::get('/producto', [ProductoController::class, 'index'])->middleware('App\Http\Middleware\ClienteAuth')->name('indexProducto');

Route::post('/buscar', [ProductoController::class, 'buscar'])->middleware('App\Http\Middleware\ClienteAuth')->name('buscarProducto');

Route::get('/servicio', [ServicioController::class, 'index'])->middleware('App\Http\Middleware\ClienteAuth')->name('servicio');

Route::post('/servicio/buscar', [ServicioController::class, 'buscar'])->middleware('App\Http\Middleware\ClienteAuth')->name('buscarServicio');

Route::get('/reservacion', [ReservacionController::class, 'index'])->middleware('App\Http\Middleware\ClienteAuth')->name('reservaciones');

Route::post('/reservacion/realizar_reserva', [ReservacionController::class, 'store'])->middleware('App\Http\Middleware\ClienteAuth')->name('realizarReserva');