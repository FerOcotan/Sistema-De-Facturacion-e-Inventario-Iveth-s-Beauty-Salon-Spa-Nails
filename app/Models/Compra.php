<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table='compra';

    protected $primaryKey='id_compra';

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
