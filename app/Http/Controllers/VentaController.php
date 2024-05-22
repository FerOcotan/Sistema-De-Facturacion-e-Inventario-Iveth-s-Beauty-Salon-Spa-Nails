<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VentaController extends Controller
{
    // Muestra una lista de ventas

    public function index()
    {
        $query = DB::table('venta')
            ->join('cliente', 'venta.id_cliente', '=', 'cliente.id_cliente')
            ->join('empleado', 'venta.id_empleado', '=', 'empleado.id_empleado')
            ->select(
                'venta.id_venta as id_venta',
                'cliente.nombre_cliente as id_cliente',
                'empleado.nombre_empleado as id_empleado',
                'venta.metodo_pago_venta as metodo_pago_venta',
                'venta.fecha_hora_venta as fecha_hora_venta',
                'venta.total_venta as total_venta'
            );
           
            $clientes = DB::table('cliente')->get();
            $ventas = $query->get();
            $empleados = DB::table('empleado')->pluck('nombre_empleado', 'id_empleado');
            $metodosPagos = ['Efectivo', 'Tarjeta', 'Transferencia'];
    
            return view('venta.index', compact('ventas', 'empleados', 'metodosPagos'));
    }
    

    // Muestra el formulario para crear una nueva venta
    public function create()
    {
  
        $venta = new Venta();
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
        $ventas = $query->get();
        $empleados = DB::table('empleado')->pluck('nombre_empleado', 'id_empleado');
        $metodosPagos = ['Efectivo', 'Tarjeta', 'Transferencia'];

        return view('venta.edit', compact('venta', 'empleados', 'metodosPagos'));
    }

    // Actualiza una venta existente en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_cliente' => 'required',
            'id_empleado' => 'required',
            'metodo_pago_venta' => 'required',
            'fecha_hora_venta' => 'required|date',
            'total_venta' => 'required|numeric',
        ]);
    
        $venta = Venta::findOrFail($id);
        $venta->update($validatedData);
    
        return redirect()->route('venta.index')
            ->with('success', 'Venta actualizada con éxito');
    }

    // Elimina una venta específica de la base de datos
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('venta.index')->with('success', 'Venta eliminada con éxito');
    }
}
