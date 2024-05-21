<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\ReservacionController2;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ServicioController2;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController2;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//use App\Models\Servicio;
//use App\Models\Reservacion;
//use App\Models\Venta;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('inicioSesion');

Route::get('/logout', [LoginController::class, 'logout'])->name('cerrarSesion');

Route::get('/producto', [ProductoController::class, 'index'])->middleware('App\Http\Middleware\ClienteAuth')->name('indexProducto');

Route::post('/buscar', [ProductoController::class, 'buscar'])->middleware('App\Http\Middleware\ClienteAuth')->name('buscarProducto');

Route::get('/servicio', [ServicioController::class, 'index'])->middleware('App\Http\Middleware\ClienteAuth')->name('servicio');

Route::post('/servicio/buscar', [ServicioController::class, 'buscar'])->middleware('App\Http\Middleware\ClienteAuth')->name('buscarServicio');

Route::get('/reservacion', [ReservacionController::class, 'index'])->middleware('App\Http\Middleware\ClienteAuth')->name('reservaciones');

Route::post('/reservacion/realizar_reserva', [ReservacionController::class, 'store'])->middleware('App\Http\Middleware\ClienteAuth')->name('realizarReserva');

Route::get('/empleado', [EmpleadosController::class, 'empleado'])->name('empleado');




Route::get('/registro', [UserController::class, 'showRegistrationForm'])->name('registro.form');
Route::post('/registro', [UserController::class, 'register'])->name('registro');


//Ruta de venta
Route::resource('venta', VentaController::class);

//Ruta de reservacion para ver desde el empleado
Route::resource('reservacionempleado', ReservacionController2::class);

//ruta de servicio para ver desde el empleado
Route::resource('servicioempleado', ServicioController2::class);

//ruta de proveedor para ver desde el empleado
Route::resource('proveedor', ProveedorController::class);

//ruta de producto para ver desde el empleado
Route::resource('productoempleado', ProductoController2::class);

