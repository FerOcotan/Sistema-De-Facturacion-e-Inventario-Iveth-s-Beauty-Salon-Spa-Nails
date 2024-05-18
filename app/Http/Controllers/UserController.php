<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registro');
    }

    public function register(Request $request)
    {

        // Crear y guardar un nuevo cliente
        $cliente = new Cliente();
        $cliente->id_estado = 3;
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->apellido_cliente = $request->apellido_cliente;
        $cliente->telefono_cliente = $request->telefono_cliente;
        $cliente->direccion_cliente = $request->direccion_cliente;
        $cliente->dui_cliente = $request->dui_cliente;
        $cliente->email_cliente = $request->email_cliente;
       //  $cliente->clave_cliente = Hash::make($request->clave_cliente); no me funciona a la hora de logear si hasheo
        $cliente->clave_cliente = $request->clave_cliente;
        $cliente->img_user = $request->img_user;

        if ($cliente->save()) {
            return view('login.index')->with('success', 'Registro exitoso. Por favor, inicie sesión.');
        } else {
            return redirect()->route('registro.form')->with('error', 'Hubo un problema al guardar el registro. Intente nuevamente.');
        }
    }
}


