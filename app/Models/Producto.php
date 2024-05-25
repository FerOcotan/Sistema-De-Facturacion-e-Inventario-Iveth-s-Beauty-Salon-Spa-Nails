<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    static $rules = [
        //'id_producto' => 'required',
        'id_estado' => 'required',
        'nombre_producto' => 'required',
        'precio_producto' => 'required',
        'existencias' => 'requires',

    ];

    protected $table='producto';
    protected $primaryKey='id_producto';

    public $timestamps=false;
    protected $perPage = 20;


    protected $fillable=[
        'id_categoria',
        'id_estado',
        'nombre_producto',
        'precio_producto',
        'existencias',
        'img_producto'
    ];
}
