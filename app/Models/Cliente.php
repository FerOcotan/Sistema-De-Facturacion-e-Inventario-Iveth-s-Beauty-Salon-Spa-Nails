<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    static $rules = [
        //'id_cliente' => 'required',
        'id_estado' => 'required',
        'nombre_cliente' => 'required',
        'apellido_cliente' => 'required',
        'telefono_cliente' => 'required|date',
        'direccion_cliente' => 'required',
        'dui_cliente' => 'required',
        'email_cliente' => 'required',
        'clave_cliente' => 'required',
        //'img_use' => 'required',
    ];

    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $perPage = 20;

    public $timestamps = false;

    protected $fillable = [
        'id_estado' => 'required',
        'nombre_cliente',
        'apellido_cliente',
        'telefono_cliente',
        'direccion_cliente',
        'dui_cliente',
        'email_cliente',
        'clave_cliente',
        //'img_user'
    ];
}
