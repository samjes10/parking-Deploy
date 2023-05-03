<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\MySqlBuilder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateParqueosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('estado');
            $table->integer('filas');
            $table->integer('columnas');
            $table->integer('cantidadEspacios');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE parqueos AUTO_INCREMENT = 1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parqueos');
    }
}
