<?php

namespace App\Livewire;

use App\Events\SlideConfigEvent;
use App\Events\SlideEvent;
use App\Events\SlideUpdatedEvent;
use App\Models\SlideConfig;
use App\Models\VideoBank;
use Livewire\Component;

class VideoPreview extends Component
{
    public $video;

    public function render()
    {

        return view('livewire.video-preview');
    }

    public function SetBackground(){
        $config = new VideoBank();
        $config->set_background($this->video->id);

        event(new SlideEvent());
    
    }
}
