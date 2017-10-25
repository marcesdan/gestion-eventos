<?php

use App\Asistente;
use App\Contacto;
use Illuminate\Database\Seeder;

class ContactoTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asistentes = Asistente::all();
        foreach ($asistentes as $asistente) {
            $contacto = factory(Contacto::class)->make();
            $contacto->timestamps = false;
            $asistente->contacto()->save($contacto);
        }
    }
}
