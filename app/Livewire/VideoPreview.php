<?php

namespace App\Livewire;

use App\Events\SlideConfigEvent;
use App\Events\SlideEvent;
use App\Events\SlideRecharge;
use App\Events\SlideUpdatedEvent;
use App\Models\Slide;
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

    }

    public function send_show(){

        $slide = Slide::first();
        $slide_content = json_decode($slide->content);

        $content = [
            'type' => 'bible',
            'key' => 1,
            'text' => '',
            'model' => 1,
            'end' => null,
            'bg_type' => 'video_show',
            'image_background' => '',
            'video_background' => $this->video->path,
            'font_type' => '',
            'text_show' => isset($slide_content->text_show) ? $slide_content->text_show : true,
            'image_show' => isset($slide_content->image_show) ? $slide_content->image_show : true,
        ];


        $slide->content = json_encode($content);
        $slide->update();
        event(new SlideRecharge());
    }
}
