<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Muestra una lista de ventas
    public function index()
    {
        $compra = Compra::all();
        return view('compra.index', compact('compra'));
    }

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $compra = new Compra();
        return view('compra.create', compact('compra'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {
       
    try {

        
        $compra = new Compra();
        $compra->id_proveedor = $request->id_proveedor;
        $compra->id_empleado = $request->id_empleado;
        $compra->id_producto = $request->id_producto;
        $compra->cantidad_compra = $request->cantidad_compra;
        $compra->total_compra = $request->total_compra;
        $compra->fecha_hora_compra = $request->fecha_hora_compra;


    if ($compra->save()) {
        return redirect()->route('compra.index')->with('success', 'Registro exitoso. Por favor, inicie sesión.');
    } else {
     
        return redirect()->route('compra.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
    }
        } catch (\Exception $e) {
          
            return redirect()->route('compra.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }
        
        
    }

    // Muestra una venta específica
    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compra.show', compact('compra'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        return view('compra.edit', compact('compra'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_proveedor' => 'required',
            'id_empleado' => 'required',
            'id_producto' => 'required',
            'cantidad_compra' => 'required',
            'total_compra' => 'required',
            'fecha_hora_compra' => 'required',
        ]);
    
        $compra = Compra::findOrFail($id);
        $compra->update($validatedData);
    
        return redirect()->route('compra.index')
            ->with('success', 'Compra actualizada con éxito');
    }

    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);
        $compra->delete();

        return redirect()->route('compra.index')->with('success', 'Compra eliminada con éxito');
    }
}