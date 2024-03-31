<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BookIndex extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public string $query = '';

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
            'books' => auth()->user()
                ->books()
                ->when(filled($this->query), function ($query) {
                    $query->where('title', 'LIKE', '%' . $this->query . '%')
                        ->orWhere('author', 'LIKE', '%' . $this->query . '%');
                })
                ->latest()
                ->paginate(2),
        ]);
    }
}
