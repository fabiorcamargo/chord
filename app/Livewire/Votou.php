<?php

namespace App\Livewire;

use App\Events\VotouEvent;
use Livewire\Component;

class Votou extends Component
{

    public function Votou()
    {
        //dd('voutou');
        VotouEvent::dispatch();
    }

    
    public function render()
    {
        return view('livewire.votou');
    }
}
