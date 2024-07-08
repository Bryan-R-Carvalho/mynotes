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

    public $tagName;

    public $cor;

    public function mount()
    {
        $this->cores = CoresNota::getAllColors();
        $this->tags = Tag::where('user_id', auth()->id())->get();
    }

    public function store($numberCollor)
    {
        $this->validate([
            'tagName' => 'required|string|max:13',

        ], [
            'tagName.max' => 'O campo nome deve ter no máximo 13 caracteres',
        ]);
        Tag::updateOrCreate(
            ['user_id' => auth()->id(), 'cor' => $numberCollor],
            ['name' => $this->tagName]
        );

        $this->tagName = '';
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
