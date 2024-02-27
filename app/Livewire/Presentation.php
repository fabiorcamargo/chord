<?php

namespace App\Livewire;

use App\Events\SlideEvent;
use App\Events\SlideRecharge;
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

    protected $debug = true;


    public function font_size($size)
    {

        $this->config->content =
            [
                "type" => $this->config->content['type'],
                "bg_color" => $this->config->content["bg_color"],
                "font_size" => $size,
                "font_type" => $this->config->content['font_type'],
                "image_background" => $this->config->content['image_background'],
                "video_background" => $this->config->content['video_background']
            ];
        $this->config->save();
        $this->FontSize = $size;
    }




    public function render()
    {
        $slide = Slide::first();
        $this->slide = json_decode($slide->content);
        $this->config = SlideConfig::first();

        return view('livewire.presentation');
    }

    public function swichimage()
    {
        $this->slide->image_show == false ? $this->slide->image_show = true : $this->slide->image_show = false;
        $slide = Slide::first();
        $slide->content = json_encode($this->slide);
        $slide->save();
    }

    public function swichtext()
    {
        $this->slide->text_show == false ? $this->slide->text_show = true : $this->slide->text_show = false;
        $slide = Slide::first();
        $slide->content = json_encode($this->slide);
        $slide->save();
    }


    public function config()
    {
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

        $this->dispatch('slide-send')->to(ShowLyrics::class);
    }

    public function next()
    {

        $this->slide = Slide::first();

        //dd($this->slide->content);
        $id = json_decode($this->slide->content)->model;

        //dd($id);
        $type = json_decode($this->slide->content)->type;

        $content = json_decode($this->slide->content);

        //dd($content)


        if ($type == 'lyric') {
            $lyric = Lyric::find($id);
            $this->key = json_decode($this->slide->content)->key;
            if ($this->key < count(json_decode($lyric)->slide)) {

                $this->key++;
                $this->ShowSlide($type, $lyric, $this->key);
            }
        } else if ($type == 'bible') {

            $bible = Verse::find($id);

            $this->key = json_decode($this->slide->content)->key;
            if ($this->key < $bible->count()) {
                $this->key++;
                $bible = Verse::find($this->key);
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
            $this->key = json_decode($this->slide->content)->key;

            if ($this->key > 0) {
                $this->key--;
                $this->ShowSlide($type, $lyric, $this->key);
            }
        } else if ($type == 'bible') {
            $this->key == '' ? $this->key++ : '';
            $bible = Verse::find($id);

            $this->key = json_decode($this->slide->content)->key;
            if ($this->key > 1) {
                $this->key--;
                $bible = Verse::find($this->key);
                $this->ShowSlide($type, $bible, $this->key);
            }
        }
    }

    #[On('slide-send')]
    public function atualiza($data)
    {
        if ($data['record']['id'] == $this->slide->model) {
            $slide = Slide::first();
            $this->slide = json_decode($slide->content);

            $this->config = SlideConfig::first();
        } else {
            return redirect(request()->header('Referer'));
        }

    }

    public function recharge(){
        event(new SlideRecharge());
    }
}
