<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::paginate(8);

        return View('almacen.servicios.index', compact('servicios'));
    }

    public function buscar(Request $request)
    {
        $servicios = Servicio::where('nombre', 'LIKE', '%' . $request->buscarNombre . '%')
        ->paginate(8);

        if ($servicios == null)
        {
            $servicios = Servicio::paginate(8);
        }

        return View('almacen.servicios.index', compact('servicios'));
    }
}
