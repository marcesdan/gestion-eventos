<?php

use Illuminate\Database\Seeder;
use App\Asistente;

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
        foreach ($asistentes as $asistente){
            $asistente->save();
        }
    }
}
