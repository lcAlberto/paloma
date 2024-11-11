<?php

namespace App\Console;

use App\Models\BreedingRecord;
use App\Notifications\BirthReminderNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    private $monthly;

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $this->monthly = $schedule->call(function () {
//            $breedingRecords = BreedingRecord::whereDate('date_birth_prediction', '>=', now()->addMonth())->get();
//
//            foreach ($breedingRecords as $breedingRecord) {
//                $breedingRecord->notify(new BirthReminderNotification());
//            }
//        })->monthly();
        $schedule->command('send:birth-notifications')->daily();
        // $schedule->command('inspire')->hourly();
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
