<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductoController2 extends Controller
{
     public function index(Request $request)
    {
        $orderBy = $request->get('orderBy', 'id_producto'); // Ordenar por ID Producto por defecto

        $productos = Producto::join('categoria', 'producto.id_categoria', '=', 'categoria.id_categoria')
            ->join('estado', 'producto.id_estado', '=', 'estado.id_estado')
            ->select(
                'producto.id_producto',
                'categoria.nombre_categoria as id_categoria',
                'estado.nombre_estado as id_estado',
                'producto.nombre_producto',
                'producto.precio_producto',
                'producto.existencias',
                'producto.img_producto'
            )
            ->orderBy($orderBy)
            ->get();
            $categoria = DB::table('categoria')->select('id_categoria', 'nombre_categoria')->get();
            $estado = DB::table('estado')->pluck('nombre_estado', 'id_estado');
          
         
         
    
            return view('producto.index', compact('productos','categoria','estado'));
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
            $producto->img_producto = $request->img_producto;


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

    public function edit($id)
{
    $producto = Producto::select('id_producto', 'id_categoria', 'id_estado', 'nombre_producto', 'precio_producto', 'existencias', 'img_producto')->findOrFail($id);
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
            'img_producto'=> 'required',
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