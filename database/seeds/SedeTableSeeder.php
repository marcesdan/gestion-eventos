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
        $nombres = [
            'Kanga',
            'Recursos Humanos',
            'Campus',
            'Rectoría',
            'Casa de las Artes'
        ];
        $direcciones = [
            'Darwin y Canga',
            'Olegario Andrade 421',
            'Yrigoyen 879',
            'Onas 450',
            'Sánchez de Caballero 2098'];

        for ($i = 0; $i < 5; $i++) {
            $sede = new Sede;
            $sede->nombre = $nombres[$i];
            $sede->direccion = $direcciones[$i];
            $sede->save();
        }
    }
}
