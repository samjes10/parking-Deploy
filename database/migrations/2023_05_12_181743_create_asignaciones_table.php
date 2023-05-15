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
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('espacio_id');
            $table->timestamp('fecha_hora_actual')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('fecha_limite');
            $table->string('codigoEspacio');
            $table->string('cliente');
            $table->timestamps();

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