<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;

class BookIndex extends Component
{
    protected $listeners = [
        'book.created' => '$refresh'
    ];

    public function deleteBook(int $bookId)
    {
        $book = Book::find($bookId);
        $book->delete();
    }

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
