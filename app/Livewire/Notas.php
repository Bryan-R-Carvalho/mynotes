<?php

namespace App\Livewire;

use App\Enums\CoresNota;
use App\Models\Nota as NotaModel;
use Livewire\Component;
use Livewire\WithPagination;

class Notas extends Component
{
    use WithPagination;

    public $nota;

    public $cores;

    public $corNota;

    public function mount($notaId)
    {
        $this->nota = NotaModel::find($notaId); //busca a nota pelo id
        $this->cores = array_slice(CoresNota::getAllColors(), 1); //painel de cores sem branco
        $this->corNota = NotaModel::find($notaId)->cor->getCor(); //cor da nota

    }

    public function updateNota()
    {

        $this->nota->save();
    }

    public function deleteNota()
    {
        $this->nota->delete();

        return redirect()->route('notas.index');
    }

    public function changeColor($notaId, $cor)
    {
        $nota = NotaModel::find($notaId);
        $corEnum = CoresNota::getNumberByHex($cor);
        $this->nota->cor = $nota->cor->getNumberByHex($cor);
        $this->corNota = $cor;
        $this->nota->save();

    }

    public function render()
    {
        return view('livewire.notas');

    }
}
