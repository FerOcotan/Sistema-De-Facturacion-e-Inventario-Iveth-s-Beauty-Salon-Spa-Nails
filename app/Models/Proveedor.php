<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    static $rules = [
        //'id_proveedor' => 'required',
        'nombre_proveedor' => 'required',
        'direccion_proveedor' => 'required',
        'telefono_proveedor' => 'required',
    ];

    protected $table='proveedor';
    protected $primaryKey='id_proveedor';

    public $timestamps=false;
    protected $perPage = 20;

    protected $fillable=[
        'nombre_proveedor',
        'direccion_proveedor',
        'telefono_proveedor'
    ];
}
