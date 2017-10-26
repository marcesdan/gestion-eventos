<?php

use Illuminate\Database\Seeder;
use App\Evento;
use App\Asistente;

class AsistenteEventoSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asistentes = Asistente::all();
        $eventos = Evento::all();

        for ($i = 0; $i < 200; $i++) {
            $asistente = $asistentes->random();
            $evento = $eventos->random();
            $asistente->eventos()->detach($evento->id);
            $evento->asistentes()->attach($asistente->id);
        }
    }

}
