<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->string('factura');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('producto');
            $table->bigInteger('cantidad');
            $table->bigInteger('monto');
            $table->bigInteger('total');
            $table->integer('cliente_id')->unsigned();
            $table->integer('caja_id')->unsigned();

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
        Schema::dropIfExists('factura');
    }
}
