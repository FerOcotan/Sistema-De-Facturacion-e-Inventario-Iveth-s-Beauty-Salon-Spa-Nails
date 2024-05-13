<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(8);

        $categorias = Categoria::all();

        return View('almacen.productos.index', compact('productos', 'categorias'));
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

        if ($productos == null)
        {
            $productos = Producto::paginate(8);
        }

        $categorias = Categoria::all();

        return View('almacen.productos.index', compact('productos', 'categorias'));
    }
}
