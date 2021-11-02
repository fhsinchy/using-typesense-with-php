<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $book;

    public function render()
    {
        return view('livewire.card');
    }

    public function mount($book)
    {
        $this->book = $book;
    }
}
