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
            
            $table->string('codigoEspacio');
            $table->string('cliente');
            $table->decimal('precio_Espacio', 10, 2)->change();
            $table->integer('dias_retraso');
            $table->decimal('descuento', 10, 2)->change();
            $table->decimal('total', 10, 2)->change();
            $table->string('detalle')->nullable();
            $table->text('mes')->nullable();
            $table->text('mes_pago')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('asignacion_id');
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