<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function empleado()
    {
        $productos = Producto::all();

        // Lógica para mostrar la vista de empleados
        return view('empleados.index', compact('productos'));
    }
}