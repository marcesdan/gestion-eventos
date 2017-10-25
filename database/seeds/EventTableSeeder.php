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
        $events = factory(Evento::class)->times(100)->make();
        //factory(Event::class )->times(100)->create();

        foreach ($events as $event) {
            //nos quedamos con una sede aleatoria
            $sede = $sedes->random();

            //le pedimos a eloquent que nos devuelva la relacion hasMany
            $event->sede_id = $sede->id;
            $event->save();

            /* equivalente a...
              $sede = event()->save($event);
             */
        }
    }

}
