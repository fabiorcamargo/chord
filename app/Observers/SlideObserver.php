<?php

namespace App\Observers;

use App\Events\SlideEvent;
use App\Events\VotouEvent;
use App\Models\Slide;

class SlideObserver
{
    /**
     * Handle the Slide "created" event.
     */
    public function created(Slide $slide): void
    {
        //
    }

    /**
     * Handle the Slide "updated" event.
     */
    public function updated(Slide $slide): void
    {
        //VotouEvent::dispatch();
        event(new SlideEvent($slide));
        // event('slide-update');
        // broadcast(new SlideEvent($slide));
    }

    /**
     * Handle the Slide "deleted" event.
     */
    public function deleted(Slide $slide): void
    {
        //
    }

    /**
     * Handle the Slide "restored" event.
     */
    public function restored(Slide $slide): void
    {
        //
    }

    /**
     * Handle the Slide "force deleted" event.
     */
    public function forceDeleted(Slide $slide): void
    {
        //
    }
}
