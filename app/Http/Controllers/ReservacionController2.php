<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController2 extends Controller
{
    public function index()
    {
        /*
        $servicios = Servicio::all();
        $cliente = Cliente::where('email_cliente', session('correo'));

        return View('almacen.reservaciones.index', compact('servicios', 'cliente'));
        */

        $reservacionempleado = Reservacion::all();
        return view('reservacion.index', compact('reservacionempleado'));
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