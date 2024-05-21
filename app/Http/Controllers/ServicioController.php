<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::paginate(8);
        $sinResultados = false; // Agregar esta línea para evitar el error de variable indefinida

        return view('almacen.servicios.index', compact('servicios','sinResultados'));
    }

    public function buscar(Request $request)
    {
        $servicios = Servicio::where('nombre_servicio', 'LIKE', '%' . $request->buscarNombre . '%')
            ->paginate(8);
    
        $sinResultados = $servicios->isEmpty();
    
        return view('almacen.servicios.index', compact('servicios', 'sinResultados'));
    }
    
}
