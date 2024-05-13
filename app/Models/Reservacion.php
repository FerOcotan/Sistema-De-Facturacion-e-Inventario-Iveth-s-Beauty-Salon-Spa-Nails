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
        'metodo_pago',
        'fecha_hora'
    ];
}
