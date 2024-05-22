<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController2 extends Controller
{
    public function index()
    {

        $producto = Producto::all();
        return view('producto.index', compact('producto'));
    }

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {

        
        try 
        {
            $producto = new Producto();
            $producto->id_categoria = $request->id_categoria;
            $producto->id_estado = $request->id_estado;
            $producto->nombre_producto = $request->nombre_producto;
            $producto->precio_producto = $request->precio_producto;
            $producto->existencias = $request->existencias;


            if ($producto->save()) 
            {
                return redirect()->route('productoempleado.index')->with('success', 'Registro exitoso.');
            } 
            else 
            {
                
                return redirect()->route('productoempleado.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
            }
        } 
        catch (\Exception $e) 
        {
                
            return redirect()->route('productoempleado.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }     
    }

    // Muestra una venta específica
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.show', compact('producto'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_categoria' => 'required',
            'id_estado' => 'required',
            'nombre_producto' => 'required',
            'precio_producto' => 'required|numeric',
            'existencias' => 'required',
        ]);
    
        $producto = Producto::findOrFail($id);
        $producto->update($validatedData);
    
        return redirect()->route('productoempleado.index')
            ->with('success', 'Producto actualizada con éxito');
    }


    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productoempleado.index')->with('success', 'Producto eliminada con éxito');
    }
}