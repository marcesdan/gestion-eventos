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
        $sedes = Sede::all();
        $eventos = factory(Evento::class)->times(100)->make();
        //factory(Event::class )->times(100)->create();

        foreach ($eventos as $evento) {
            //nos quedamos con una sede aleatoria
            $sede = $sedes->random();
            //guardamos la sede, lo asocciamos al avento y guardamos el evento
            $evento->sede()->associate($sede->save())->save();
        }
    }

}
