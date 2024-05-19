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

        $reservacion = Reservacion::all();
        return view('reservacion.index', compact('reservacion'));
    }

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $reservacion = new Reservacion();
        return view('reservacion.create', compact('reservacion'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {

        
        try 
        {
            $reservacion = new Reservacion();
            $reservacion->id_cliente = $request->id_cliente;
            $reservacion->id_servicio = $request->id_servicio;
            $reservacion->id_estado = $request->id_estado;
            $reservacion->metodo_pago_reservacion = $request->metodo_pago_reservacion;
            $reservacion->fecha_hora_reservacion = $request->fecha_hora_reservacion;

            if ($reservacion->save()) 
            {
                return redirect()->route('reservacion.index')->with('success', 'Registro exitoso.');
            } 
            else 
            {
                
                return redirect()->route('reservacion.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
            }
        } 
        catch (\Exception $e) 
        {
                
            return redirect()->route('reservacion.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }     
    }

    // Muestra una venta específica
    public function show($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        return view('reservacion.show', compact('reservacion'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        return view('reservacion.edit', compact('reservacion'));
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
    
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->update($validatedData);
    
        return redirect()->route('reservacion.index')
            ->with('success', 'Venta actualizada con éxito');
    }


    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $reservacion = Reservacion::findOrFail($id);
        $reservacion->delete();

        return redirect()->route('reservacion.index')->with('success', 'Reservacion eliminada con éxito');
    }
}