<?php

namespace App\Http\Controllers;
use App\Http\Middleware\ClienteAuth;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Providers\AppServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    public function index()
    {


        return view('login.index');
    }

    public function login(Request $request)
    {
        $cliente = Cliente::where('email', $request->correo);

        if($cliente->doesntExist() == false)
        {
            $request->session()->put('correo', $request->correo);
            $request->session()->put('tipo_usuario', 'cliente');
            return redirect()->action([ProductoController::class, 'index']);
        }
        else
        {
            $empleado = Empleado::where('email', $request->correo);

            if($empleado->doesntExist() == false)
            {
                $request->session()->put('correo', $request->correo);
                $request->session()->put('tipo_usuario', 'empleado');
                return 'Vista de Empleados: Se debe diseñar y mostrar una vista para empleados';
            }
            else
            {
                session()->forget('correo');
                return 'Usuario no encontrado';
            }
        }
    }

    public function logout()
    {
        session()->forget('correo');
        session()->forget('tipo_usuario');
        return redirect()->action([LoginController::class, 'index']);
    }
}
