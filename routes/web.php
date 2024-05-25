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
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\AboutController;
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

Route::post('/empleado/buscardetalle', [EmpleadosController::class, 'search'])->name('empleado2');

Route::post('/empleado/ventatemporal', [EmpleadosController::class, 'storeTemp'])->name('empleado3');

Route::post('/empleado/store', [EmpleadosController::class, 'store'])->name('guardarVenta');

Route::post('/empleado/storecliente', [EmpleadosController::class, 'storeCliente'])->name('guardarCliente');

Route::post('/empleado/storeproducto', [EmpleadosController::class, 'storeProducto'])->name('guardarProducto');

Route::post('/empleado/factura', [EmpleadosController::class, 'showFacturaTemp'])->name('pdfFactura');


Route::get('/registro', [UserController::class, 'showRegistrationForm'])->name('registro.form');
Route::post('/registro', [UserController::class, 'register'])->name('registro');

//Ruta para ver el about us
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

//Rutare para dirigir el about us desde otro lugar.
//return redirect()->route('about.index');




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

//ruta de cliente para ver desde el empleado
Route::resource('cliente', ClienteController::class);

//ruta de compra para ver desde el empleado
Route::resource('compra', CompraController::class);


