<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table='proveedores';
    protected $fillable = [
        'codigo',
        'proveedor',
        'factura',
        'ubicacion'
    ];

    public function productosproveedor() {
        return $this->belongsToMany('App\Productosproveedor')->withTimestamps();
    }
}
