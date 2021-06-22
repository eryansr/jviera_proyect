<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosproveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productosproveedor', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('producto');
            $table->string('existencia');
            $table->string('costo_producto');
            $table->string('factura');

            $table->unsignedInteger('proveedor_id'); 
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productosproveedor');
    }
}
