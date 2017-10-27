<?php

namespace App\Console;

use App\Console\Commands\EnviarNotificacionEvento;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use function base_path;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        EnviarNotificacionEvento::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*
          $schedule->command('EnviarNotificacionEvento:enviar_notificacion')
          ->everyMinute();
         */
        /*  
        $schedule->command('EnviarNotificacionEvento:enviar_notificacion --force --daemon')
                  ->everyMinute();*/
        $schedule->command(EnviarNotificacionEvento::class, ['--force'])
                ->everyMinute()
                ->sendOutputTo('NUL');
        //->dailyAt('8:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

}
