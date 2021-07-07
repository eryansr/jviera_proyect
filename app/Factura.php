<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table='factura';
    protected $fillable = [
        'factura',
        'nombre',
        'apellido',
        'cedula',
        'producto',
        'cantidad',
        'monto',
        'total',
        'cliente_id',
        'caja_id'
    ];
}
