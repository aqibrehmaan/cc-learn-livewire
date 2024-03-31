<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 space-y-4">
        @if ($editing)
            <livewire:update-book :book="$book" />
        @endif

        <div>
            <h2 class="text-lg font-medium leading-snug">{{ $book->title }}</h2>
            <div>by {{ $book->author }}</div>
        </div>

        <ul class="flex items-center space-x-2">
            <li>
                <button wire:click="$toggle('editing')" class="text-blue-500">Edit</button>
            </li>
            <li>
                <button
                    x-data
                    x-on:click="
                        if (window.confirm('Are you sure?')) {
                            $wire.$parent.deleteBook({{ $book->id }})
                        }
                    "
                    class="text-blue-500"
                >Delete</button>

                {{-- <button wire:click="$parent.deleteBook({{ $book->id }})" class="text-blue-500">Delete</button> --}}
            </li>
        </ul>
    </div>
</div>
