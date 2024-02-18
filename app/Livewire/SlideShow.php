<?php

namespace App\Livewire;

use App\Models\Slide;
use App\Models\SlideConfig;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;


class SlideShow extends Component
{
    public $slide;
    public $minhaVariavel;
    public $config;
    public $data;

    //protected $listeners = ['refreshComponent' => 'getSections'];

    #[On('countUpdated')]
    public function countUpdated()
    {
        Log::info('ProductUpdated event was triggered.');
        $this->config = null;
        $this->mount();
    }

    public function getSections()
    {
        Log::info('ProductUpdated event was triggered.');

        $this->config = SlideConfig::first();
    }

    public function mount(){
        $this->data = Slide::first();
        $this->slide = [
            'text' => html_entity_decode(json_decode($this->data->content)->text),
            'end' => html_entity_decode(json_decode($this->data->content)->end)
        ];
        $this->config = SlideConfig::first();
    }

    public function render()
    {



        return view('livewire.slide-show');
    }

}
