<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required',
        ]);

        $nota->update($request->all());

        return redirect()->back();
    }
}
