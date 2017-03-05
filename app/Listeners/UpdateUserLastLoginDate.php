<?php

namespace App\Listeners;

use Illuminate\Auth\Events;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateUserLastLoginDate
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
     * @param  auth.login  $event
     * @return void
     */
    public function handle(Events\Login $event)
    {
        $event->user->last_logged_in_at = \Carbon\Carbon::now();
        $event->user->save();
    }
}
