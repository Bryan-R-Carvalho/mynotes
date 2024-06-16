<?php

namespace App\Livewire;

use App\Enums\CoresNota;
use App\Models\Nota;
use Livewire\Attributes\On;
use Livewire\Component;

class ContainerNotas extends Component
{
    public $notas;

    public $favoritos;

    public function mount()
    {
        $notas = Nota::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        $this->favoritos = $notas->where('favoritado', 1);
        $this->notas = $notas->where('favoritado', 0);
    }

    #[On('filtraNota')]
    public function search($query)
    {
        $notas = Nota::where('user_id', auth()->id())
            ->where(function ($search) use ($query) {
                $search->where('titulo', 'like', "%{$query}%")
                    ->orWhere('conteudo', 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $this->favoritos = $notas->where('favoritado', 1);
        $this->notas = $notas->where('favoritado', 0);
    }

    #[On('filtraTag')]
    public function filterByTag($cor)
    {
        if ($cor == null) {
            $notas = Nota::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $cor = CoresNota::getNumberByHex($cor);
            $notas = Nota::where('user_id', auth()->id())
                ->where('cor', $cor)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        $this->favoritos = $notas->where('favoritado', 1);
        $this->notas = $notas->where('favoritado', 0);
    }

    public function render()
    {
        return view('livewire.container-notas');
    }
}
