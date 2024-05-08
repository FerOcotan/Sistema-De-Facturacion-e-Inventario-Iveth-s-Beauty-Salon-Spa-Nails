<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table='usuario';

    protected $primaryKey='id_usuario';

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'dui',
        'email',
        'img_user',
        'id_rol'
    ];
}
