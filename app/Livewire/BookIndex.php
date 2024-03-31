<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BookIndex extends Component
{
    use WithPagination;

    protected $listeners = [
        'book.created' => '$refresh'
    ];

    public function deleteBook(int $bookId)
    {
        $book = Book::find($bookId);

        $this->authorize('delete', $book);

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
            'books' => auth()->user()->books()->latest()->paginate(3),
        ]);
    }
}
