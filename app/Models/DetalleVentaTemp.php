<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVentaTemp extends Model
{
    use HasFactory;

    protected $table='detalle_venta_temp';

    protected $primaryKey='id_detalle';

    public $timestamps=false;

    protected $fillable=[
        'id_venta',
        'id_producto',
        'id_cliente',
        'id_empleado',
        'cantidad_detalle',
        'subtotal_detalle'
    ];
}
