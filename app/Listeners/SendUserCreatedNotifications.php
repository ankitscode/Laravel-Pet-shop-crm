<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use App\Events\NewUsers;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserCreatedNotifications implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // Initialization if needed
    }

    /**
     * Handle the event.
     */
    public function handle(NewUsers $event): void
    {
        foreach (User::whereNot('id', $event->user->id)->cursor() as $user) {
            $user->notify(new NewUserNotification($event->user));
            Log::info("Notification sent to user: {$user->id} for new user: {$event->user->id}");
        }
    }
}
