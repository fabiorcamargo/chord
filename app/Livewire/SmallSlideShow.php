<?php

namespace App\Livewire;

use App\Models\Slide;
use App\Models\SlideConfig;
use Livewire\Attributes\On;
use Livewire\Component;


class SmallSlideShow extends Component
{
    public $slide;
    public $minhaVariavel;
    public $config;
    public $data;

    public $swich_text;
    public $swich_image;

    //protected $listeners = ['refreshComponent' => 'getSections'];


    // protected $listeners = ['echo:slide,SlideEvent' => 'mount'];


    public function atualizar()
    {
        $this->data = Slide::first();
        $this->slide = [
            'text' => html_entity_decode(json_decode($this->data->content)->text),
            'end' => html_entity_decode(json_decode($this->data->content)->end)
        ];
        $this->config = SlideConfig::first();
    }

    public function mount()
    {
        $this->data = Slide::first();

        $this->slide = [
            'text' => html_entity_decode(json_decode($this->data->content)->text),
            'end' => html_entity_decode(json_decode($this->data->content)->end)
        ];
        $this->config = SlideConfig::first();


        //Corrigir para salvar na database
        $data = json_decode($this->data->content);
        isset($data->background) == false ? $data->background = true : '';
        isset($data->text_show) == false ? $data->text_show = true : '';
        $this->data = $data;
        //$this->data->save();

    }

    public function render()
    {

        return view('livewire.small-slide-show');
    }
}
