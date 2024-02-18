<?php

namespace App\Listeners;

use App\Events\SlideConfigEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SlideConfigListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
       
    }

    /**
     * Handle the event.
     */
    public function handle(SlideConfigEvent $event): void
    {
        //
    }
}
