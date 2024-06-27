<?php

namespace App\Models;

use App\Enums\CoresNota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'cor',
    ];

    public function find($id)
    {
        return $this->where('id', $id)->first();
    }

    public function notas()
    {
        return $this->belongsToMany(Nota::class);
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
