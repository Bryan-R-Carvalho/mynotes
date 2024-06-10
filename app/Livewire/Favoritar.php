<?php

namespace App\Livewire;

use App\Models\Nota;
use Livewire\Component;

class Favoritar extends Component
{
    public $nota;

    public function mount($nota)
    {
        $this->nota = $nota;
    }

    public function favoritar($id): void
    {
        try {
            $nota = Nota::find($id);
            if ($nota->favoritado) {
                $nota->favoritado = false;
            } else {
                $nota->favoritado = true;
            }
            $nota->save();
        } catch (\Exception $e) {
            $this->emit('error', 'Erro ao favoritar a nota');
        }
        $this->nota = $nota;
    }

    public function render()
    {
        return view('livewire.favoritar');
    }
}
