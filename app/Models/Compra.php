<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    static $rules = [
        'id_proveedor' =>'required',
        'id_empleado' =>'required',
        'id_producto' =>'required',
        'cantidad_compra' =>'required',
        'total_compra' =>'required',
        'fecha_hora_compra' =>'required',
    ];

    protected $table='compra';
    protected $primaryKey='id_compra';
    protected $perPage = 20;

    public $timestamps=false;

    protected $fillable=[
        'id_proveedor',
        'id_empleado',
        'id_producto',
        'cantidad_compra',
        'total_compra',
        'fecha_hora_compra'
    ];
}
