<?php

namespace App\Console\Commands;

use App\Evento;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EnviarNotificacionEvento extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'EnviarNotificacionEvento:enviar_notificacion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia una notificacion por email el dia del evento';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*$eventos = Evento::whereDate('fecha', DB::raw('CURDATE()'))->get();
        foreach ($eventos as $evento) {
            $asistentes = $evento->asistentes()->get();
            foreach ($asistenets as $assitente) {
                sendEmail();
            }
        }*/
        
         DB::table('evento')->delete();
        
    }
}
