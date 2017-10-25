<?php

use Illuminate\Database\Seeder;
use App\Sede;
use App\Contacto;

class SedeTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactos = Contacto::all();
        $nombres = ['Darwin', 'RRHH', 'Yrigoyen', 'Onas', 'Malvinas'];
        
        foreach ($nombres as $nombre) {
            $sede = new Sede;
            $sede->nombre = $nombre;
            $sede->contacto_id = $contactos->random()->id;
            $sede->timestamps = false;
            $sede->save();
        }
        /*
          Sede::create(['nombre' => 'Kanga', 'contacto_id' => $contactos->random()->id]);
          Sede::create(['nombre' => 'RRHH', 'contacto_id' => $contactos->random()->id]);
          Sede::create(['nombre' => 'Yrigoyen', 'contacto_id' => $contactos->random()->id]);
          Sede::create(['nombre' => 'Onas', 'contacto_id' => $contactos->random()->id]);
          Sede::create(['nombre' => 'Pipo', 'contacto_id' => $contactos->random()->id]);
          }
         */
    }

}
