<div class="space-y-4">
    @if ($books->count())
        <div class="space-y-2" id="books">
            @foreach ($books as $book)
                <livewire:book-item :book="$book" wire:key="{{ $book->id }}" />
            @endforeach
        </div>

        {{ $books->links(data: ['scrollTo' => '#books']) }}
    @endif
</div>
