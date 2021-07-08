<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table='facturas';
    protected $fillable = [
        'numero_factura',
        'nombre_cliente',
        'cedula_cliente',
        'producto',
        'cantidad',
        'monto',
        'total',
        'cliente_id',
        'caja_id'
    ];
}
