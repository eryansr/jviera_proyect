<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table='clientes';
    protected $fillable = [
        'numero_factura',
        'nombre',
        'apellido',
        'cedula',
        'telefono',
        'email',
        'redsocial',
        'caja_id'
    ];
}
