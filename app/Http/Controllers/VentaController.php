<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    // Muestra una lista de ventas
    public function index()
    {
        $venta = Venta::all();
        return view('venta.index', compact('venta'));
    }

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        return view('venta.create', compact('venta'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {
       
    try {

        
        $ventas = new Venta();
        $ventas->id_cliente = $request->id_cliente;
        $ventas->id_empleado = $request->id_empleado;
        $ventas->metodo_pago_venta = $request->metodo_pago_venta;
        $ventas->fecha_hora_venta = $request->fecha_hora_venta;
        $ventas->total_venta = $request->total_venta;


    if ($ventas->save()) {
        return redirect()->route('venta.index')->with('success', 'Registro exitoso. Por favor, inicie sesión.');
    } else {
     
        return redirect()->route('venta.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
    }
        } catch (\Exception $e) {
          
            return redirect()->route('venta.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }
        
        
    }

    // Muestra una venta específica
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('venta.show', compact('venta'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        return view('venta.edit', compact('venta'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cliente' => 'required',
            'empleado' => 'required',
            'metodo_pago' => 'required',
            'fecha' => 'required|date',
            'total' => 'required|numeric',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($validatedData);

        return redirect()->route('venta.index')->with('success', 'Venta actualizada con éxito');
    }

    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('venta.index')->with('success', 'Venta eliminada con éxito');
    }
}
