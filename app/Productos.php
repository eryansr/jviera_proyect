<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';
    protected $fillable = [
        'codigo',
        'descripcion',
        'precio_compra',
        'precio_venta',
        'existencia',
        'linea',
        'proveedor_id',
        'ubicacion'
    ];
}
