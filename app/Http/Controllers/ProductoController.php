<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(8);
        $categorias = Categoria::all();

        // Definir la variable $sinResultados como false para evitar errores en la vista
        $sinResultados = false;

        return view('almacen.productos.index', compact('productos', 'categorias', 'sinResultados'));
    }

    public function buscar(Request $request)
    {
        if (!empty($request->id_categoria))
        {
            $productos = Producto::where('nombre_producto', 'LIKE', '%' . $request->buscarNombre . '%')
                ->where('id_categoria', '=', $request->id_categoria)
                ->paginate(8);
        }
        else
        {
            $productos = Producto::where('nombre_producto', 'LIKE', '%' . $request->buscarNombre . '%')
                ->paginate(8);
        }
    
        // Verificar si no se encontraron productos
        $sinResultados = $productos->isEmpty();
    
        $categorias = Categoria::all();
    
        return view('almacen.productos.index', compact('productos', 'categorias', 'sinResultados'));
    }
}

