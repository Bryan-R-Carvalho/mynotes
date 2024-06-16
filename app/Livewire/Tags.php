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
        $this->cores = CoresNota::getAllColors();
        $this->tags = Tag::where('user_id', auth()->id())->get();
    }

    public function selectTag($cor)
    {
        if ($this->corTag == $cor) {
            $this->corTag = null;
            $this->dispatch('filtraTag', cor: null);
        } else {
            $this->corTag = $cor;
            $this->dispatch('filtraTag', cor: $cor);
        }
    }

    public function render()
    {
        return view('livewire.tags');
    }
}
