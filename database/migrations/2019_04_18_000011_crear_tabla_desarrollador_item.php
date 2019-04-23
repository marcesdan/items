<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDesarrolladorItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollador_item', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('item_id');
            $table->foreign('item_id')
                ->references('id')
                ->on('item')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('desarrollador_id');
            $table->foreign('desarrollador_id')
                ->references('id')
                ->on('desarrollador')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
            //un mismo desarrollador puede estar asignado a un item solo una vez.
            $table->unique(['desarrollador_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollador_item');
    }
}
