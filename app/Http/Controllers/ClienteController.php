<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Muestra una lista de ventas
    public function index()
    {
        $cliente = Cliente::all();
        $estados = DB::table('estado')->pluck('nombre_estado', 'id_estado');
        return view('cliente.index', compact('cliente','estados'));
    }

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    // Almacena una nueva venta en la base de datos
    public function store(Request $request)
    {
       
    try {

        
        $cliente = new Cliente();
        $cliente->id_estado = $request->id_estado;
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->apellido_cliente = $request->apellido_cliente;
        $cliente->telefono_cliente = $request->telefono_cliente;
        $cliente->direccion_cliente = $request->direccion_cliente;
        $cliente->dui_cliente = $request->dui_cliente;
        $cliente->email_cliente = $request->email_cliente;
        $cliente->clave_cliente = $request->clave_cliente;
        //$cliente->img_user = $request->img_user; 


    if ($cliente->save()) {
        return redirect()->route('cliente.index')->with('success', 'Registro exitoso. Por favor, inicie sesión.');
    } else {
     
        return redirect()->route('cliente.create')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
    }
        } catch (\Exception $e) {
          
            return redirect()->route('cliente.create')->with('error', 'Hubo un problema al procesar el registro: ' . $e->getMessage());
        }
        
        
    }

    // Muestra una venta específica
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', compact('cliente'));
    }

    // Muestra el formulario para editar una venta existente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_estado' => 'required',
            'nombre_cliente' => 'required',
            'apellido_cliente' => 'required',
            'telefono_cliente' => 'required',
            'direccion_cliente' => 'required',
            'dui_cliente' => 'required',
            'email_cliente' => 'required',
            'clave_cliente' => 'required',
            //'img_use' => 'required',
        ]);
    
        $cliente = Cliente::findOrFail($id);
        $cliente->update($validatedData);
    
        return redirect()->route('cliente.index')
            ->with('success', 'Cliente actualizada con éxito');
    }

    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('cliente.index')->with('success', 'Cliente eliminada con éxito');
    }
}
