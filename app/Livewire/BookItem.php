<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;

class BookItem extends Component
{
    public Book $book;

    public BookForm $form;

    public bool $editing = false;

    public function mount()
    {
        $this->form->setBook($this->book);
    }

    public function updatedFormNotes()
    {
        $this->form->updateNotes();
    }

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
