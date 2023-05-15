<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asignacion_id');
            $table->string('codigoEspacio');
            $table->string('cliente');
            $table->decimal('monto', 10, 2)->change();
            $table->integer('dias_retraso');
            $table->decimal('total', 10, 2)->change();
            $table->string('detalle')->nullable();
            $table->date('fecha_hora_actual');
            $table->timestamps();

            $table->foreign('asignacion_id')->references('id')->on('asignaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}