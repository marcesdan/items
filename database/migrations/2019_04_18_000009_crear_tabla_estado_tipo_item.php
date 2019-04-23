<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEstadoTipoItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Los estados que puede atravesar el tipo de ítem. Son los nodos del grafo
        Schema::create('estado_tipo_item', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('tipo_item_id');
            $table->foreign('tipo_item_id')
                ->references('id')
                ->on('tipo_item')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estado')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_tipo_item');
    }
}
