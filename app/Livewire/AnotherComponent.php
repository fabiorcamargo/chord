<?php

namespace App\Livewire;

use Livewire\Component;

class AnotherComponent extends Component
{
    public $count = 0;

    protected $listeners = ['countUpdated'];

    public function countUpdated($newCount)
    {
        $this->count = $newCount;
    }

    public function render()
    {
        return view('livewire.another-component');
    }
}
