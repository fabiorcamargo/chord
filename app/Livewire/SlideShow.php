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
    public $text;
    public $end;
    public $font_size;

    #[On('echo:slide,SlideRecharge')]
    public function recharge(){
        return redirect(request()->header('Referer'));
    }


    #[On('echo:slide,SlideEvent')]
    public function atualiza($data){

        if (json_decode($data['slide']['content'])->type == 'bible'){
            $this->dispatch('restart-animation');

        }else{
        if(json_decode($data['slide']['content'])->model == $this->slide->model){
            $this->dispatch('restart-animation');
        }else{
            return redirect(request()->header('Referer'));
        }
    }
    }

    #[On('atualiza2')]
    public function atualiza2(){
            $slide = Slide::first();
            $this->slide = json_decode($slide->content);
            $this->text = $this->slide->text;
            $this->end = $this->slide->end;
            $this->config = SlideConfig::first();
    }

    #[On('echo:slide,SlideConfigEvent')]
    public function font($data){
        $this->font_size = $data['slideConfig']['content']['font_size'];
    }
    public function mount(){
        $slide = Slide::first();
        $this->slide = json_decode($slide->content);
        $this->text = $this->slide->text;
        $this->end = $this->slide->end;
        $this->config = SlideConfig::first();
        $this->font_size = $this->config->content['font_size'];
    }

    public function render()
    {
        return view('livewire.slide-show');
    }

}
