<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('espacios', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('decripcion')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('parqueo_id');
            $table->foreign('parqueo_id')
                    ->references('id')
                    ->on('parqueos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE espacios AUTO_INCREMENT = 1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacios');
    }
}