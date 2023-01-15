<?php

namespace App\Listeners;

use App\Events\NewRegisteredUserEvent;
use App\Models\User;
use App\Notifications\NewRegisteredUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NewRegisteredUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewRegisteredUserEvent $event)
    {

        Notification::send($event->user, new NewRegisteredUserNotification($event->user));
    }
}
