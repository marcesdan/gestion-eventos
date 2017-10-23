<?php

use Illuminate\Database\Seeder;
use App\Asistente;
use App\Contacto;

class AsistenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$asistentes = factory(Asistente::class)->times(100)->make();
        $contactos = Contacto::all();
		
		foreach ($asistentes as $asistente) 
        {
            $contacto = $contactos->random();
            $asistente->contacto_id = $contacto->id;
			$asistente->save();
		}
    }
}
