<?php

namespace App\Livewire;

use Livewire\Component;

class ListenWebsocket extends Component
{
    public array $items = [];

    protected $listeners = ['echo:game,VotouEvent' => 'votou'];
    public function render()
    {
        return view('livewire.listen-websocket');
    }


    public function votou($data){
        dump($data);
    }
}
