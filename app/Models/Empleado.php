<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table='empleado';

    protected $primaryKey='id_empleado';

    public $timestamps=false;

    protected $fillable=[
        'id_rol',
        'id_estado',
        'nombre_empleado',
        'apellido_empleado',
        'telefono_empleado',
        'direccion_empleado',
        'dui_empleado',
        'email_empleado',
        'clave_empleado'
    ];
}
