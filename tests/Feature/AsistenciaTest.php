<?php

namespace Tests\Feature;

use Tests\TestCase;
use \App\Asistente;
use \App\Evento;

class AsistenciaTest extends TestCase
{
    /**
     * @test
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $asistente = Asistente::all()->random();
        $evento = Evento::all()->random();
        $evento->asistentes()->attach($asistente);
        
        
    }

}
