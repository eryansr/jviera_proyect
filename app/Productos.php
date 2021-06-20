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
        'factura_proveedor',
        'ubicacion',
        'linea_id',
        'marca_id',
        'drogueria_id',
        'estatus_id'
    ];
}
