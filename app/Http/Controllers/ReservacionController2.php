<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservacionController2 extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->get('orderBy', 'id_reservacion'); // Ordenar por ID Producto por defecto
        $query = DB::table('reservacion')
            ->join('cliente', 'reservacion.id_cliente', '=', 'cliente.id_cliente')
            ->join('servicio', 'reservacion.id_servicio', '=', 'servicio.id_servicio')
            ->join('estado', 'reservacion.id_estado', '=', 'estado.id_estado')
            ->select(
                'reservacion.id_reservacion',
                'cliente.nombre_cliente as nombre_cliente',
                'servicio.id_servicio',
                'servicio.nombre_servicio as nombre_servicio',
                'estado.id_estado',
                'estado.nombre_estado as estado',
                'reservacion.metodo_pago_reservacion',
                'reservacion.fecha_hora_reservacion'
            )
            ->orderBy($orderBy); 

        if ($request->has('fecha') && $request->input('fecha') !== null) {
            $query->whereDate('reservacion.fecha_hora_reservacion', $request->input('fecha'));
        }

        $reservaciones = $query->get();

        $clientes = DB::table('cliente')->get();
        $servicios = DB::table('servicio')->pluck('nombre_servicio', 'id_servicio');
        $estados = DB::table('estado')->pluck('nombre_estado', 'id_estado');
        $metodosPago = ['Efectivo', 'Tarjeta', 'Transferencia'];

        return view('reservacion.index', compact('reservaciones', 'clientes', 'servicios', 'estados', 'metodosPago'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_cliente' => 'required',
            'id_servicio' => 'required',
            'id_estado' => 'required',
            'metodo_pago_reservacion' => 'required',
            'fecha_hora_reservacion' => 'required|date',
        ]);

        $reservacionempleado = new Reservacion();
        $reservacionempleado->id_cliente = $request->id_cliente;
        $reservacionempleado->id_servicio = $request->id_servicio;
        $reservacionempleado->id_estado = $request->id_estado;
        $reservacionempleado->metodo_pago_reservacion = $request->metodo_pago_reservacion;
        $reservacionempleado->fecha_hora_reservacion = $request->fecha_hora_reservacion;

        $reservacionempleado->save();

        return redirect()->route('reservacionempleado.index')->with('success', 'Registro exitoso.');
    }

    public function edit($id)
    {
        $reservacionempleado = Reservacion::findOrFail($id);
        $clientes = DB::table('cliente')->get();
        $servicios = DB::table('servicio')->pluck('nombre_servicio', 'id_servicio');
        $estados = DB::table('estado')->pluck('nombre_estado', 'id_estado');
        $metodosPago = ['Efectivo', 'Tarjeta', 'Transferencia'];

        return view('reservacion.edit', compact('reservacionempleado', 'clientes', 'servicios', 'estados', 'metodosPago'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_servicio' => 'required',
            'id_estado' => 'required',
            'metodo_pago_reservacion' => 'required',
            'fecha_hora_reservacion' => 'required|date',
        ]);

        $reservacionempleado = Reservacion::findOrFail($id);
        $reservacionempleado->update($validatedData);

        return redirect()->route('reservacionempleado.index')
            ->with('success', 'Reservacion actualizada con éxito');
    }

    public function destroy($id)
    {
        $reservacionempleado = Reservacion::findOrFail($id);
        $reservacionempleado->delete();

        return redirect()->route('reservacionempleado.index')->with('success', 'Reservacion eliminada con éxito');
    }
}
