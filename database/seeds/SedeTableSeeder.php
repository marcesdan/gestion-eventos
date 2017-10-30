<?php

use Illuminate\Database\Seeder;
use App\Sede;

class SedeTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres = ['Darwin', 'Recursos Humanos', 'Campus', 'Rectoría', 'Malvinas'];
        foreach ($nombres as $nombre){
            $sede = new Sede;
            $sede->nombre = $nombre;
            $sede->save();
        }
    }
}
