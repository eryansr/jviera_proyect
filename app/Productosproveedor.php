<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productosproveedor extends Model
{
    protected $table='productosproveedor';
    protected $fillable = [
        'codigo',
        'producto',
        'existencia',
        'costo_producto',
        'factura'
    ];

    public function proveedores() {
        return $this->belongsToMany('App\Proveedores')->withTimestamps();
    }

}
