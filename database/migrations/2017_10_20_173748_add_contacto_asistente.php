<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactoAsistente extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Asistente', function (Blueprint $table) {
            $table->unsignedInteger('contacto_id')
                    ->after('apellido')->index();
            $table->foreign('contacto_id')
                    ->references('id')
                    ->on('Contacto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Asistente', function (Blueprint $table) {
            $table->dropColumn('contacto_id');
        });
    }

}
