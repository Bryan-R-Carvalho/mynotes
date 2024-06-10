<?php

namespace App\Livewire;

use App\Enums\CoresNota;
use App\Models\Tag;
use Livewire\Component;

class Tags extends Component
{
    public $cores;

    public $corTag;

    public $tags;

    public function mount()
    {
        $this->cores = array_slice(CoresNota::getAllColors(), 1);
        $this->tags = Tag::all();

    }

    public function selectTag($cor)
    {
        //passa o hex
        $this->dispatch('filtraTag', cor: $cor);
    }

    public function render()
    {
        return view('livewire.tags');
    }
}
