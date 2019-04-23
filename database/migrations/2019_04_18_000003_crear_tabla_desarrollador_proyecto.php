<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDesarrolladorProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Relacion muchos a muchos entre desarrollador y proyecto
        Schema::create('desarrollador_proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('proyecto_id');
            $table->foreign('proyecto_id')
                    ->references('id')
                    ->on('proyecto')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedInteger('desarrollador_id');
            $table->foreign('desarrollador_id')
                    ->references('id')
                    ->on('desarrollador')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
            //un mismo desarrollador puede estar asignado a un proyecto solo una vez.
            $table->unique(['desarrollador_id', 'proyecto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollador_proyecto');
    }
}
