<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->mediumText('descripcion')->nullable();
            $table->date('fecha_estimada')->nullable();
            $table->enum('prioridad', ['urgente','alta', 'media','baja']);

            $table->unsignedInteger('tipo_item_id');
            $table->foreign('tipo_item_id')
                ->references('id')
                ->on('tipo_item')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('proyecto_id');
            $table->foreign('proyecto_id')
                ->references('id')
                ->on('proyecto')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('item');
    }
}
