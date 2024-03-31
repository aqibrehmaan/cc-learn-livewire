<div class="space-y-4">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <label for="query" class="sr-only">Search</label>
            <input wire:model.live.debounce.300ms="query" type="search" id="query" class="w-full border border-slate-300 rounded-lg" placeholder="Search your books">
        </div>
    </div>

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
</div>
