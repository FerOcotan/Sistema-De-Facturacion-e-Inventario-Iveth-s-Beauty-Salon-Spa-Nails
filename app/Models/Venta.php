<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    static $rules = [
		//'id_venta' => 'required',
		'id_cliente' => 'required',
		'id_empleado' => 'required',
		'metodo_pago_venta' => 'required',
    'fecha_hora_venta' => 'required',
		'fecha_venta' => 'required',
    ];

    protected $table='venta';
    protected $primaryKey='id_venta';
    protected $perPage = 20;

    public $timestamps=false;

    protected $fillable=[
        'id_cliente',
        'id_empleado',
        'metodo_pago_venta',
        'fecha_hora_venta',
        'total_venta'
    ];
}
