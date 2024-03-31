<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;

class BookItem extends Component
{
    public Book $book;

    public bool $editing = false;

    #[On('book.{book.id}.updated')]
    public function bookHasBeenUpdated()
    {
        $this->editing = false;
    }

    public function render()
    {
        return view('livewire.book-item');
    }
}
