<?php

use Illuminate\Database\Seeder;
use App\Evento;
use App\Sede;

class EventTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos = factory(Evento::class)->times(100)->make();
        foreach ($eventos as $evento) {
            //Asocciamos al avento una sede, y guardamos el evento
            $evento->sede()->associate(Sede::all()->random());
            $evento->save();
        }
    }
}
