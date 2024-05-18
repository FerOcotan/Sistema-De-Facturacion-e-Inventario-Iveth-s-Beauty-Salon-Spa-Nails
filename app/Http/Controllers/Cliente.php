<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cliente extends Model
{
    use Notifiable;

    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'id_estado', 'nombre_cliente', 'apellido_cliente', 'telefono_cliente', 'direccion_cliente', 'dui_cliente', 'email_cliente', 'clave_cliente', 'img_user',
    ];

    protected $hidden = [
        'clave_cliente',
    ];
}
