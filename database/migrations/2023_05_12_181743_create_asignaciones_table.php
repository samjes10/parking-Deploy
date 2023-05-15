<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_limite');
            $table->string('carnet_Cliente');
            $table->string('nombre_Cliente');
            $table->string('codigoEspacio');
            $table->string('estado_pago')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('espacio_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onUpdate('cascade');
            $table->foreign('espacio_id')->references('id')->on('espacios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaciones');
    }
}