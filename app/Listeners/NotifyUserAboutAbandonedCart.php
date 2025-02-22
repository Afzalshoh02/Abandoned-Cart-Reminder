<?php

namespace App\Listeners;

use App\Events\CartAbandoned;
use App\Jobs\SendAbandonedCartEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUserAboutAbandonedCart
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
    public function handle(CartAbandoned $event)
    {
        dispatch(new SendAbandonedCartEmailJob($event->cart));
    }
}
