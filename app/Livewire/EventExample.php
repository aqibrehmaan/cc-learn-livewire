<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class EventExample extends Component
{
    #[On('example-event')]
    public function doSomething()
    {
        dd('something');
    }

    public function dispatchSomeEvent()
    {
        $this->dispatch('example-event');
    }

    public function render()
    {
        return view('livewire.event-example');
    }
}
