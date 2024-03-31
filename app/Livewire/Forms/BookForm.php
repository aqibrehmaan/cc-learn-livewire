<?php

namespace App\Livewire\Forms;

use App\Models\Book;
use Livewire\Attributes\Rule;
use Livewire\Form;

class BookForm extends Form
{
    public ?Book $book;

    #[Rule('required', message: ':attribute is required', as: 'Title of the book')]
    public string $title = '';

    #[Rule('required', message: ':attribute is required', as: 'Author of the book')]
    public string $author = '';

    #[Rule('nullable')]
    public ?string $notes = '';

    public function setBook(Book $book)
    {
        $this->book = $book;

        $this->fill(
            $book->only('title', 'author', 'notes')
        );
    }

    public function update()
    {
        $this->book->update(
            $this->only('title', 'author')
        );

        $this->reset();
    }

    public function updateNotes()
    {
        $this->book->update(
            $this->only('notes')
        );
    }

    public function create()
    {
        $book = auth()->user()->books()->create(
            $this->only('title', 'author')
        );

        $this->reset();

        return $book;
    }
}
