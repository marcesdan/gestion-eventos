<?php

use Illuminate\Database\Seeder;
use App\Contacto;

class ContactoTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactos = factory(Contacto::class)->times(100)->make();
        foreach ($contactos as $contacto) {
            $contacto->timestamps = false;
            $contacto->save();
        }
    }

}
