<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table='venta';

    protected $primaryKey='id_venta';

    public $timestamps=false;

    protected $fillable=[
        'id_cliente',
        'id_empleado',
        'metodo_pago_venta',
        'fecha_hora_venta',
        'total_venta'
    ];
}
