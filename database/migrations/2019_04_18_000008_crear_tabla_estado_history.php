<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEstadoHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_history', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('item_id');
            $table->foreign('item_id')
                ->references('id')
                ->on('item')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estado')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('responsable_id');
            $table->foreign('responsable_id')
                ->references('id')
                ->on('desarrollador')
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
        Schema::dropIfExists('estado_history');
    }
}
