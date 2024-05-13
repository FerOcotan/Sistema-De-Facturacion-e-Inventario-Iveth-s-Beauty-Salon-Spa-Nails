<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table='detalle_venta';

    protected $primaryKey='id_detalle';

    public $timestamps=false;

    protected $fillable=[
        'id_venta',
        'id_producto',
        'cantidad_detalle',
        'subtotal_detalle'
    ];
}
