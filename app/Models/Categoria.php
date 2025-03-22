<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'cat_categoria';
    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_nome',
    ];

    public function despesas(): HasMany
    {
        return $this->hasMany(Despesa::class, 'cat_id', 'cat_id');
    }
}
