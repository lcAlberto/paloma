<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BirthReminderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class TestNotificationController extends Controller
{
    public function send(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $message = $request->message ?? 'Esta é uma notificação de teste';
        Notification::send($user, new BirthReminderNotification($message));

        return response()->json(['message' => 'Notificação enviada com sucesso']);
    }
}
