<?php

namespace App\Livewire;

use Livewire\Component;

class SlideShow extends Component
{
    public $votou = 1;

    protected $listeners = ['echo:game,VotouEvent' => 'votou'];

    public function render()
    {
        return view('livewire.slide-show');
    }

    public function votou($data){

        $this->votou++;
    }
}
