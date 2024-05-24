<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Muestra una lista de ventas
    public function index()
    {
        return view('about.index');
    }
 
}