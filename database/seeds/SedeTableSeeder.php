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
      	Sede::create(['nombre' => 'Kanga']);
		Sede::create(['nombre' => 'RRHH']);
		Sede::create(['nombre' => 'Yrigoyen']);
		Sede::create(['nombre' => 'Onas']);
		Sede::create(['nombre' => 'Pipo']);
    }
}
