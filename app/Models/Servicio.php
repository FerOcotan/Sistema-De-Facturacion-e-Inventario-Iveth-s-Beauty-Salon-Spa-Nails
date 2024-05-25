<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table='servicio';
    protected $primaryKey='id_servicio';

    public $timestamps=false;

    protected $fillable=[
        'id_estado',
        'nombre_servicio',
        'descripcion_servicio',
        'precio_servicio',
        'img_servicio'
    ];
}
