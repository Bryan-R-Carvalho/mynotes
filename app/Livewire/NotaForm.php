<?php

namespace App\Livewire;

use App\Models\Nota;
use Livewire\Component;

class NotaForm extends Component
{
    public $titulo;

    public $conteudo;

    public $favoritado = false;

    public function store()
    {
        $this->validate([
            'titulo' => 'required',
            'conteudo' => 'required',
        ]);

        $user = auth()->id();

        $nota = new Nota();
        $nota->titulo = $this->titulo;
        $nota->conteudo = $this->conteudo;
        $nota->favoritado = $this->favoritado;
        $nota->user_id = $user;
        $nota->save();

        $this->titulo = '';
        $this->conteudo = '';
        $this->favoritado = false;

        $this->dispatch('notaAdicionada');
    }

    public function alternarFavorito()
    {
        $this->favoritado = ! $this->favoritado;
    }

    public function render()
    {
        return view('livewire.nota-form');
    }
}
