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
        $this->config = SlideConfig::first();

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
        $this->config = SlideConfig::first();
    }

    public function ShowSlide($type, $model, $id)
    {
        //dd($model);

        if ($type == 'bible') {
            $model->show_slide($type, $model->text, $model, $this->key);
        } else if ($type == 'lyric') {
            $slide_array = $model->slide;
            //dd($slide_array);
            if (isset($slide_array[$this->key])) {
                $model->show_slide($type, $slide_array[$this->key]['text'], $model, $this->key);
            } else {
            }
        }
    }

    public function next()
    {

        $this->slide = Slide::first();
        $id = json_decode($this->slide->content)->model;
        $type = json_decode($this->slide->content)->type;

        $content = json_decode($this->slide->content);

        //dd($content);

        if ($type == 'lyric') {
            $lyric = Lyric::find($id);
            //dd(json_decode($lyric)->slide);
            if ($this->key < count(json_decode($lyric)->slide)) {
                $this->key++;
                $this->ShowSlide($type, $lyric, $this->key);
            }
        } else if ($type == 'bible') {
            $this->key == '' ? $this->key++ : '';
            $bible = Verse::find($id);
            //dd($bible->count());

            if ($this->key < $bible->count()) {
                $this->key++;
                $bible = Verse::find($this->key);
                //dd($bible);
                $this->ShowSlide($type, $bible, $this->key);
            }
        }


    }

    public function back()
    {
        $this->slide = Slide::first();
        $id = json_decode($this->slide->content)->model;
        $type = json_decode($this->slide->content)->type;

        $content = json_decode($this->slide->content);

        //dd($content);

        if ($type == 'lyric') {
            $lyric = Lyric::find($id);
            //dd(json_decode($lyric)->slide);
            if ($this->key > 0) {
                $this->key++;
                $this->ShowSlide($type, $lyric, $this->key);
            }
        } else if ($type == 'bible') {
            $this->key == '' ? $this->key++ : '';
            $bible = Verse::find($id);
            //dd($bible->count());
            //dd($this->key);
            if ($this->key > 1) {
                $this->key--;
                //dd($this->key);
                $bible = Verse::find($this->key);
                //dd($bible);
                $this->ShowSlide($type, $bible, $this->key);
            }
        }
    }
}
