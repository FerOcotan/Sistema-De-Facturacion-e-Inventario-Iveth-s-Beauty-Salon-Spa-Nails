<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table='reservacion';

    protected $primaryKey='id_reservacion';

    public $timestamps=false;

    protected $fillable=[
        'id_cliente',
        'id_servicio',
        'id_estado',
        'metodo_pago_reservacion',
        'fecha_hora_reservacion'
    ];
}
