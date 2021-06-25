<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{

    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo');
            $table->string('descripcion');
            $table->bigInteger('precio_compra');
            $table->bigInteger('precio_venta');
            $table->bigInteger('existencia');
            $table->string('factura_proveedor');
            $table->string('linea');
            $table->string('ubicacion');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
