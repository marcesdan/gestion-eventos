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
        
        Sede::create(['nombre' => 'Kanga', 'contacto_id' => $contactos->random()->id]);
        Sede::create(['nombre' => 'RRHH', 'contacto_id' => $contactos->random()->id]);
        Sede::create(['nombre' => 'Yrigoyen', 'contacto_id' => $contactos->random()->id]);
        Sede::create(['nombre' => 'Onas', 'contacto_id' => $contactos->random()->id]);
        Sede::create(['nombre' => 'Pipo', 'contacto_id' => $contactos->random()->id]);  
    }
}
