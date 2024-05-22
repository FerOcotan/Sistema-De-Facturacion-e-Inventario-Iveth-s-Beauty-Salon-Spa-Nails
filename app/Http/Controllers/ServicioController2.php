<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController2 extends Controller
{
    public function index()
    {

        $servicio = Servicio::all();
        return view('servicio.index', compact('servicio'));
    }

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $servicio = new Servicio();
        return view('servicio.create', compact('servicio'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {

        
        try 
        {
            $servicio = new Servicio();
            $servicio->id_estado = $request->id_estado;
            $servicio->nombre_servicio = $request->nombre_servicio;
            $servicio->descripcion_servicio = $request->descripcion_servicio;
            $servicio->precio_servicio = $request->precio_servicio;


            if ($servicio->save()) 
            {
                return redirect()->route('servicioempleado.index')->with('success', 'Registro exitoso.');
            } 
            else 
            {
                
                return redirect()->route('servicioempleado.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
            }
        } 
        catch (\Exception $e) 
        {
                
            return redirect()->route('servicioempleado.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }     
    }

    // Muestra una venta específica
    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicio.show', compact('servicio'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicio.edit', compact('servicio'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_estado' => 'required',
            'nombre_servicio' => 'required',
            'descripcion_servicio' => 'required',
            'precio_servicio' => 'required|numeric',
        ]);
    
        $servicio = Servicio::findOrFail($id);
        $servicio->update($validatedData);
    
        return redirect()->route('servicioempleado.index')
            ->with('success', 'Servicio actualizada con éxito');
    }


    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        return redirect()->route('servicioempleado.index')->with('success', 'Servicio eliminada con éxito');
    }
}