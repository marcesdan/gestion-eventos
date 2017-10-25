<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSedeColumnToEvent extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Evento', function (Blueprint $table) {
            $table->unsignedInteger('sede_id')
                    ->index()
                    ->after('descripcion');
            $table->foreign('sede_id')
                    ->references('id')
                    ->on('Sede');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Evento', function (Blueprint $table) {
            $table->dropColumn('sede_id');
        });
    }

}
