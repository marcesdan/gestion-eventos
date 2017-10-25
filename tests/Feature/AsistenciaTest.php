<?php

namespace Tests\Feature;

use Tests\TestCase;
use \App\Asistente;
use \App\Evento;
use \App\Contacto;
use \App\Sede;

class AsistenciaTest extends TestCase
{

    use \Illuminate\Foundation\Testing\RefreshDatabase;

    /**
     * @test
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $asistente = new Asistente;
        $asistente->nombre = 'Pedro';
        $asistente->apellido = 'Gomez';
        $asistente->documento = '375332222';
        $contacto = new Contacto;
        $contacto->email = 'pedrogomez@gmail.com';
        $contacto->telefono = '15606964';
        $contacto->timestamps = false;
        $asistente->save();
        $asistente->contacto()->save($contacto);
        $evento = new Evento;
        $evento->nombre = 'Evento1';
        $evento->fecha = \Carbon\Carbon::now();
        $sede = new Sede;
        $sede->nombre = 'Sede1';
        $sede->timestamps = false;
        $evento->sede()->associate($sede->save())->save();  
        $evento->asistentes()->attach($asistente->id);
    }

}
