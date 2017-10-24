<?php

use Illuminate\Database\Seeder;
use App\Event;
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
        $eventos = Event::all();

        for ($i = 0 ; $i < 500 ; $i++){
        	
        	$asistente = $asistentes->random();
        	$evento = $eventos->random();

        	$asistente->eventos()->attach($evento->id);
        	$evento->asistentes()->attach($asistente->id);
        }
    }
}
