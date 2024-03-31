<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UpdateBook extends Component
{
    public Book $book;

    #[Rule('required')]
    public string $title = '';

    #[Rule('required')]
    public string $author = '';

    public function mount()
    {
        $this->title = $this->book->title;
        $this->author = $this->book->author;
    }

    public function submit()
    {
        $this->validate();

        $this->book->update([
            'title' => $this->title,
            'author' => $this->author,
        ]);

        $this->dispatch('book.' . $this->book->id . '.updated');
    }

    public function render()
    {
        return view('livewire.update-book');
    }
}
