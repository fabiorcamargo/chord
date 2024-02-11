<?php

namespace App\Livewire;

use App\Models\Slide;
use App\Models\SlideConfig;
use Livewire\Component;

class Presentation extends Component
{
    public $slide;
    public $minhaVariavel;
    public $config;


    public function atualiza(){
        $slide = Slide::first();

        $this->slide = [
            'text' => html_entity_decode(json_decode($slide->content)->text),
            'end' => html_entity_decode(json_decode($slide->content)->end)
        ];

        $this->config = SlideConfig::first();
    }
    public function render()
    {
        $slide = Slide::first();

        $this->slide = [
            'text' => html_entity_decode(json_decode($slide->content)->text),
            'end' => html_entity_decode(json_decode($slide->content)->end)
        ];

        $this->config = SlideConfig::first();

        return view('livewire.presentation');
    }

    public function proximo(){

    }
}
