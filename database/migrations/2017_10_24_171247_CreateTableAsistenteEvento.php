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
        Schema::create('AsistenteEvento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('evento_id')->index();
            $table->unsignedInteger('asistente_id')->index();
            $table->foreign('evento_id')
                    ->references('id')
                    ->on('Evento')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('asistente_id')
                    ->references('id')
                    ->on('Asistente')
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
        Schema::dropIfExists('AsistenteEvento');
    }

}
