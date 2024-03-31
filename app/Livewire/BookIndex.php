<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use Livewire\Attributes\On;
use Livewire\Component;

class BookIndex extends Component
{
    protected $listeners = [
        'book.created' => '$refresh'
    ];

    // #[On('book.created')]
    // public function bookCreated()
    // {
    //     //
    // }

    public function render()
    {
        return view('livewire.book-index', [
            'books' => auth()->user()->books()->latest()->get(),
        ]);
    }
}
