<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use App\Models\Servicio;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    public function index()
    {
        $servicios = Servicio::all();
        $cliente = Cliente::where('email_cliente', session('correo'));

        return View('almacen.reservaciones.index', compact('servicios', 'cliente'));
    }

    public function store(Request $request)
    {
        $id_cliente = Cliente::where('email_cliente', session('correo'));

        $reservacion = new Reservacion();
        $reservacion->id_cliente = $id_cliente->first()->id_cliente;
        $reservacion->id_estado = 5;
        $reservacion->id_servicio = $request->id_servicio;
        $reservacion->metodo_pago_reservacion = $request->metodo_pago;
        $reservacion->fecha_hora_reservacion = $request->fecha . ' ' . $request->hora;
        $reservacion->save();

        return redirect()->action([ProductoController::class, 'index']);
    }
}
