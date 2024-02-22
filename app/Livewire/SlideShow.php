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

    protected $listeners = ['echo:slide,SlideEvent' => 'atualiza'];

    public function atualiza(){
        $slide = Slide::first();
        $this->slide = json_decode($slide->content);
        $this->config = SlideConfig::first();
        $this->config = json_decode($this->config->content);
        //return redirect(request()->header('Referer'));


    }
    public function mount(){
        $slide = Slide::first();
        $this->slide = json_decode($slide->content);

        $this->config = SlideConfig::first();
        $this->config = json_decode($this->config->content);


    }

    public function render()
    {
        return view('livewire.slide-show');
    }

}
