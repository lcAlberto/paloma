<?php

namespace App\Notifications;

use App\Models\BreedingRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BirthReminderNotification extends Notification
{
    use Queueable;

//    protected $breedingRecord;
    protected $message;

    public function __construct($message)
    {
//        $this->breedingRecord = $breedingRecord;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data' => [
                'message' => $this->message,
            ],
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
        ];
    }

    //    public function toMail($notifiable)
    //    {
    //        return (new MailMessage)
    //            ->line('You have an upcoming animal birth!')
    //            ->line('Predicted Birth Date: ' . $this->breedingRecord->date_birth_prediction->format('d/m/Y'))
    //            ->action('View Details', url('/breeding-records/' . $this->breedingRecord->id))
    //            ->line('Thank you for using our application!');
    //    }
}
