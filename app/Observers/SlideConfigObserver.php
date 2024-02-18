<?php

namespace App\Observers;

use App\Events\SlideConfigEvent;
use App\Events\SlideUpdatedEvent;
use App\Models\SlideConfig;

class SlideConfigObserver
{
    /**
     * Handle the SlideConfig "created" event.
     */
    public function created(SlideConfig $slideConfig): void
    {

    }

    /**
     * Handle the SlideConfig "updated" event.
     */
    public function updated(SlideConfig $slideConfig): void
    {
        event(new SlideConfigEvent($slideConfig));
    }

    /**
     * Handle the SlideConfig "deleted" event.
     */
    public function deleted(SlideConfig $slideConfig): void
    {
        //
    }

    /**
     * Handle the SlideConfig "restored" event.
     */
    public function restored(SlideConfig $slideConfig): void
    {
        //
    }

    /**
     * Handle the SlideConfig "force deleted" event.
     */
    public function forceDeleted(SlideConfig $slideConfig): void
    {
        //
    }
}
