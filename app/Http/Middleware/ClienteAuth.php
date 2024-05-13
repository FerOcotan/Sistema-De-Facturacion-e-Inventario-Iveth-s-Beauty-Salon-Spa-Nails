<?php

namespace App\Http\Middleware;

use App\Http\Controllers\LoginController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Cliente;

use function PHPUnit\Framework\isEmpty;

class ClienteAuth
{
    protected $correo;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('correo'))
        {
            return $next($request);
        }
        else
        {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    public function login($correo, Request $request) : bool
    {
        $cliente = Cliente::where('email', $correo);

        if($cliente->doesntExist() == false)
        {   
            return true;
        }
        else
        {
            return false;
        }
    }
}
