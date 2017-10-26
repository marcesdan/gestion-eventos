<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAsistenteEvento extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistente_evento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('evento_id');
            $table->unsignedInteger('asistente_id');
            $table->engine = 'InnoDB';
            $table->foreign('evento_id')
                    ->references('id')
                    ->on('evento')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('asistente_id')
                    ->references('id')
                    ->on('asistente')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unique(['evento_id', 'asistente_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistente_evento');
    }

}
