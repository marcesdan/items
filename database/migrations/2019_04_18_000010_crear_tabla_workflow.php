<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaWorkflow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Las transiciones posibles entre los estados
        Schema::create('workflow', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('estado_from_id');
            $table->foreign('estado_from_id')
                ->references('id')
                ->on('estado')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('estado_to_id');
            $table->foreign('estado_to_id')
                ->references('id')
                ->on('estado')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('tipo_item_id');
            $table->foreign('tipo_item_id')
                ->references('id')
                ->on('tipo_item')
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
        Schema::dropIfExists('workflow');
    }
}
