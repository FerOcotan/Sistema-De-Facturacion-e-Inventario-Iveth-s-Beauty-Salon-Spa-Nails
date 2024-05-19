<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    static $rules = [
	//'id_resercacion' => 'required',
	'id_cliente' => 'required',
	'id_servicio' => 'required',
	'id_estado' => 'required',
    'metodo_pago_reservacion' => 'required',
	'fecha_hora_reservacion' => 'required',
    ];

    protected $table='reservacion';
    protected $primaryKey='id_reservacion';
    protected $perPage = 20;

    public $timestamps=false;

    protected $fillable=[
        'id_cliente',
        'id_servicio',
        'id_estado',
        'metodo_pago_reservacion',
        'fecha_hora_reservacion'
    ];
}
