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
        $nombres = ['Darwin', 'RRHH', 'Yrigoyen', 'Onas', 'Malvinas'];
        foreach ($nombres as $nombre){
            $sede = new Sede;
            $sede->nombre = $nombre;
            $sede->save();
        }
    }
}
