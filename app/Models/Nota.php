<?php

namespace App\Models;

use App\Enums\CoresNota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'conteudo',
        'favoritado',
        'cor',
        'image',
    ];

    protected function find($id)
    {
        return $this->where('id', $id)->first();
    }

    public function favoritar()
    {
        $this->favoritado = true;
        $this->save();
    }

    public function desfavoritar()
    {
        $this->favoritado = false;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'cor' => CoresNota::class,
        ];
    }
}
