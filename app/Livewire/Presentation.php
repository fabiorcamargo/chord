<?php

namespace App\Livewire;

use App\Events\SlideEvent;
use App\Listeners\SlideListener;
use App\Models\Lyric;
use App\Models\Slide;
use App\Models\SlideConfig;
use App\Models\Verse;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Event;



class Presentation extends Component
{
    public $slide;
    public $minhaVariavel;
    public $config;
    public $key;
    public $data;

    public $FontSize = 5;

    public function font_size($size)
    {
        $this->FontSize = $size;

        $this->config->font_size = $size;

        $slide_config = SlideConfig::first();
        $slide_config->content = json_encode($this->config);

        $slide_config->save();

    }



    public function render()
    {
        $slide = Slide::first();
        $this->slide = json_decode($slide->content);

        //dd($this->slide->image_background);
        $this->config = SlideConfig::first();
        //dd($this->config->cont);
        $this->config = json_decode($this->config->content);

        //dd($this->config);

        return view('livewire.presentation');

    }

    public function swichimage(){
        $this->slide->image_show == false ? $this->slide->image_show = true : $this->slide->image_show = false;
        $slide = Slide::first();
        $slide->content = json_encode($this->slide);
        $slide->save();
    }

    public function swichtext(){
        $this->slide->text_show == false ? $this->slide->text_show = true : $this->slide->text_show = false;
        $slide = Slide::first();
        $slide->content = json_encode($this->slide);
        $slide->save();
    }

    public function config(){
        $slide = Slide::first();

        $this->slide = json_decode($slide->content);

        //dd($this->slide);

        // $this->slide = [
        //     'text' => html_entity_decode(json_decode($slide->content)->text),
        //     'end' => html_entity_decode(json_decode($slide->content)->end)
        // ];

        $this->config = SlideConfig::first();
    }

    public function ShowSlide($type, $model, $id)
    {
        if ($type == 'bible') {
            $model->show_slide($type, $model->text, $model->id, $this->key);
        } else if ($type == 'lyric') {
            $slide_array = $model->slide;
            if (isset($slide_array[$this->key])) {
                $model->show_slide($type, $slide_array[$this->key]['text'], $model->id, $this->key);
            } else {
            }
        }
    }

    public function next()
    {

        $this->slide = Slide::first();
        $id = json_decode($this->slide->content)->model;
        $type = json_decode($this->slide->content)->type;
        if ($type == 'lyric') {
            $lyric = Lyric::find($id);
            if ($this->key < count(json_decode($lyric)->slide)) {
                $this->key++;
                $this->ShowSlide($type, $lyric, $this->key);
            }
        } else if ($type == 'bible') {
            $bible = Verse::find($id);
            if ($this->key < $bible->count()) {
                $this->key++;
                $bible = Verse::find($this->key);
                $this->ShowSlide($type, $bible, $id);
            }
        }


    }

    public function back()
    {
        $this->slide = Slide::first();
        $id = json_decode($this->slide->content)->model;
        $type = json_decode($this->slide->content)->type;
        if ($type == 'lyric') {
            $lyric = Lyric::find($id);
            if ($this->key > 0) {
                $this->key--;
                $this->ShowSlide($type, $lyric, $id);
            }
        } else if ($type == 'bible') {
            $bible = Verse::find($id);
            if ($this->key > 1) {
                $this->key--;
                $bible = Verse::find($this->key);
                $this->ShowSlide($type, $bible, $id);
            }
        }
    }
}
