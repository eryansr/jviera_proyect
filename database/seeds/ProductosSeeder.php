<?php

use Illuminate\Database\Seeder;
use App\Productos;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = new Productos();
        $producto->codigo = '301';
        $producto->descripcion = 'Gatorade';
        $producto->precio_compra = '1';
        $producto->precio_venta = '5';
        $producto->existencia = '200';
        $producto->factura_proveedor = '2323';
        $producto->ubicacion = 'Maracay';
        $producto->linea_id = '1';
        $producto->marca_id = '1';
        $producto->drogueria_id = '1';
        $producto->estatus_id = '1';
        $producto->save();

        $producto = new Productos();
        $producto->codigo = '333';
        $producto->descripcion = 'Gel antibacterial';
        $producto->precio_compra = '2';
        $producto->precio_venta = '5';
        $producto->existencia = '200';
        $producto->factura_proveedor = '2323';
        $producto->ubicacion = 'Maracay';
        $producto->linea_id = '2';
        $producto->marca_id = '2';
        $producto->drogueria_id = '1';
        $producto->estatus_id = '1';
        $producto->save();   
    }

}
