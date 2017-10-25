<?php

namespace Tests\Feature;

use Tests\TestCase;
use \App\Contacto;
use \App\Asistente;

class AsistenteTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function createTest()
    {
        $asistente = new Asistente;
        $asistente->nombre = 'Pedro';
        $asistente->apellido = 'Gomez';
        $asistente->documento = '37533200';
        $contacto = new Contacto;
        $contacto->email = 'pedrogomez@gmail.com';
        $contacto->telefono = '15606964';
        $contacto->timestamps = false;    
        $asistente->save();
        $asistente->contacto()->save($contacto);

        $asistente = Asistente::find($asistente->id);
        $this->assertTrue($asistente->nombre == 'Pedro', 
                'El nombre no se encontro');   
        $this->assertTrue($asistente->contacto->email == 'pedrogomez@gmail.com', 
                'El email no se encontro');
    }
    
    /**
     * @test
     *
     * @return void
     */
    public function deleteTest()
    {
        $asistente = new Asistente;
        $asistente->nombre = 'Pedro';
        $asistente->apellido = 'Gomez';
        $asistente->documento = '37533201';
        
        $contacto = new Contacto;
        $contacto->email = 'pedrogomez@gmail.com';
        $contacto->telefono = '15606964';
        $contacto->timestamps = false;
        
        $asistente->save();
        $asistente->contacto()->save($contacto);
        
        $asistente = Asistente::all()->random();
        $contacto_id = $asistente->contacto->id;
        $asistente->delete();
        
        $this->assertNull(Contacto::find($contacto_id), 
                'Se borro el asistente, pero el contacto no (cascade)');
    }
    
    /**
     * @test
     *
     * @return void
    
    public function dissociateTest()
    {
        $asistente = Asistente::all()->random();
        $asistente->contacto()->dissociate();
        $nuevoAsistente = $asistente->save();
        
        assertNull($nuevoAsistente->email,
                'Luego de disociar, sigue teniendo un contacto!');
        
        assertNotNull($asistente->email, 'Apa, tambien es null');
    } */
}
