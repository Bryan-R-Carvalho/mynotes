<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $query;

    public function eventSearch()
    {
        $this->validate([
            'query' => 'required',
        ]);
        $this->dispatch('filtraNota', $this->query);
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
