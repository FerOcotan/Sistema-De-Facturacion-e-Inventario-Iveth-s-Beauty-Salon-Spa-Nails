<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(8);
        $categorias = Categoria::all();

        // Definir la variable $sinResultados como false para evitar errores en la vista
        $sinResultados = false;

        $categorias = DB::table('categoria')->select('id_categoria', 'nombre_categoria')->get();
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

    public function showFilterModal()
    {
        // Retrieve all categories
        $categorias = Categoria::all();

        // Pass categories to the view
        return view('filterModal', compact('categorias'));
    }

    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('idCatCombo');

        // Perform the filtering logic here
        // For example, retrieve products or items based on the selected category
        // $items = Item::where('categoria_id', $categoryId)->get();

        // For now, let's just redirect back with the selected category as an example
        return redirect()->back()->with('selectedCategory', $categoryId);
    }
}

