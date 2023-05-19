<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialReclamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_reclamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reclamo_id')->constrained('reclamos');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->string('nombre_cliente');
            $table->string('accion')->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('historial_reclamos');
    }
}
