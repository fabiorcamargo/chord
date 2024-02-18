<?php

namespace App\Livewire;

use App\Models\Lyric;
use App\Models\Slide;
use App\Models\SlideConfig;
use App\Models\Verse;
use Livewire\Component;

class Presentation extends Component
{
    public $slide;
    public $minhaVariavel;
    public $config;
    public $key;

    public function render()
    {

        $this->slide = Slide::first();
        $this->key = json_decode($this->slide->content)->key;
        $this->config = SlideConfig::first();
        return view('livewire.presentation');
        
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
