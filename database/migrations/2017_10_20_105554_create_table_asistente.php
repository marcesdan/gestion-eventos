<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAsistente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asistente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('documento');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
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
        Schema::table('asistente', function (Blueprint $table) {
            //
        });
    }
}
