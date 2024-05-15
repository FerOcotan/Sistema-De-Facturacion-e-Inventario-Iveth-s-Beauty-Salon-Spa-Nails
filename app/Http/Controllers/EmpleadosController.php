<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function empleado()
    {
        // Lógica para mostrar la vista de empleados
        return view('empleados.index');
    }
}