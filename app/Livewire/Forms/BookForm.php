<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class BookForm extends Form
{
    #[Rule('required', message: ':attribute is required', as: 'Title of the book')]
    #[Rule('min:5')]
    public string $title = '';

    #[Rule('required', message: ':attribute is required', as: 'Author of the book')]
    #[Rule('min:5')]
    public string $author = '';

    public function create()
    {
        auth()->user()->books()->create([
            'title' => $this->title,
            'author' => $this->author
        ]);

        $this->reset();
    }
}
