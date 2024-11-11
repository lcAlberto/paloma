<?php

namespace App\Console\Commands;

use App\Models\BreedingRecord;
use Carbon\Carbon;
use Illuminate\Console\Command;

use App\Notifications\BirthReminderNotification;
use Illuminate\Support\Facades\Notification;

class SendBirthPredictionNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birth-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send birth prediction notifications';

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
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $notifications = BreedingRecord::whereIn('date_birth_prediction', [
            $now->copy()->addMonth()->toDateString(),
            $now->copy()->addWeek()->toDateString(),
            $now->copy()->addDay()->toDateString()
        ])->get();

        foreach ($notifications as $record) {
            $user = $record->female->farm->user; // Assumindo que o usuário é associado à fazenda
            $message = "Previsão de nascimento para o animal {$record->female->name} é em {$record->date_birth_prediction}";

            Notification::send($user, new BirthReminderNotification($record, $message));
        }
    }
}
