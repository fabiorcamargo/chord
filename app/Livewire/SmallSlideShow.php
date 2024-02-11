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



    public function render()
    {
        $slide = Slide::first();

        $this->slide = [
            'text' => html_entity_decode(json_decode($slide->content)->text),
            'end' => html_entity_decode(json_decode($slide->content)->end)
        ];

        $this->config = SlideConfig::first();

        $this->dispatch('open-modal', id: 'show-slide');

        return view('livewire.small-slide-show');


    }
}
