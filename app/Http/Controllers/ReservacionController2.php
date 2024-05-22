<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReservacionController2 extends Controller
{
    public function index(Request $request)
{
    $fecha = $request->input('fecha');

    $query = DB::table('reservacion')
        ->join('cliente', 'reservacion.id_cliente', '=', 'cliente.id_cliente')
        ->join('servicio', 'reservacion.id_servicio', '=', 'servicio.id_servicio')
        ->join('estado', 'reservacion.id_estado', '=', 'estado.id_estado')
        ->select(
            'reservacion.id_reservacion',
            'cliente.nombre_cliente as nombre_cliente',
            'servicio.id_servicio', // Agregamos id_servicio
            'servicio.nombre_servicio as nombre_servicio',
            'estado.id_estado', // Agregamos id_estado
            'estado.nombre_estado as estado',
            'reservacion.metodo_pago_reservacion',
            'reservacion.fecha_hora_reservacion'
        );

    if ($fecha) {
        $query->whereDate('reservacion.fecha_hora_reservacion', $fecha);
    }

    $reservaciones = $query->get();
    $clientes = DB::table('cliente')->get(['id_cliente', DB::raw("CONCAT(nombre_cliente, ' ', apellido_cliente) AS nombre_completo")]);


    $servicios = DB::table('servicio')->pluck('nombre_servicio', 'id_servicio');
    $estados = DB::table('estado')->pluck('nombre_estado', 'id_estado');
    $metodosPago = ['Efectivo', 'Tarjeta', 'Transferencia'];

    return view('reservacion.index', compact('reservaciones', 'servicios', 'estados', 'metodosPago','clientes'));
}


    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $reservacionempleado = new Reservacion();
        return view('reservacion.create', compact('reservacionempleado'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {

        
        try 
        {
            $reservacionempleado = new Reservacion();
            $reservacionempleado->id_cliente = $request->id_cliente;
            $reservacionempleado->id_servicio = $request->id_servicio;
            $reservacionempleado->id_estado = $request->id_estado;
            $reservacionempleado->metodo_pago_reservacion = $request->metodo_pago_reservacion;
            $reservacionempleado->fecha_hora_reservacion = $request->fecha_hora_reservacion;

            if ($reservacionempleado->save()) 
            {
                return redirect()->route('reservacionempleado.index')->with('success', 'Registro exitoso.');
            } 
            else 
            {
                
                return redirect()->route('reservacionempleado.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
            }
        } 
        catch (\Exception $e) 
        {
                
            return redirect()->route('reservacionempleado.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }     
    }

    // Muestra una venta específica
    public function show($id)
    {
        $reservacionempleado = Reservacion::findOrFail($id);
        return view('reservacion.show', compact('reservacionempleado'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $reservacionempleado = Reservacion::findOrFail($id);
        return view('reservacion.edit', compact('reservacionempleado'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_cliente' => 'required',
            'id_servicio' => 'required',
            'id_estado' => 'required',
            'metodo_pago_reservacion' => 'required',
            'fecha_hora_reservacion' => 'required|date',
        ]);
    
        $reservacionempleado = Reservacion::findOrFail($id);
        $reservacionempleado->update($validatedData);
    
        return redirect()->route('reservacionempleado.index')
            ->with('success', 'Venta actualizada con éxito');
    }


    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $reservacionempleado = Reservacion::findOrFail($id);
        $reservacionempleado->delete();

        return redirect()->route('reservacionempleado.index')->with('success', 'Reservacion eliminada con éxito');
    }
}