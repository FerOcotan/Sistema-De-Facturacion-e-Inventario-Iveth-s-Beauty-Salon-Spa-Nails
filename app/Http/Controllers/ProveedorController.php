<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {

        $proveedor = Proveedor::all();
        return view('proveedor.index', compact('proveedor'));
    }

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $proveedor = new Proveedor();
        return view('proveedor.create', compact('proveedor'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {

        
        try 
        {
            $proveedor = new Proveedor();
            $proveedor->nombre_proveedor = $request->nombre_proveedor;
            $proveedor->direccion_proveedor = $request->direccion_proveedor;
            $proveedor->telefono_proveedor = $request->telefono_proveedor;


            if ($proveedor->save()) 
            {
                return redirect()->route('proveedor.index')->with('success', 'Registro exitoso.');
            } 
            else 
            {
                
                return redirect()->route('proveedor.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
            }
        } 
        catch (\Exception $e) 
        {
                
            return redirect()->route('proveedor.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }     
    }

    // Muestra una venta específica
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.show', compact('proveedor'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre_proveedor' => 'required',
            'direccion_proveedor' => 'required',
            'telefono_proveedor' => 'required',
        ]);
    
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($validatedData);
    
        return redirect()->route('proveedor.index')
            ->with('success', 'Proveedor actualizada con éxito');
    }


    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedor.index')->with('success', 'Proveedor eliminada con éxito');
    }
}