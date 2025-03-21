<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'cat_categoria';
    protected $primaryKey = 'cat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cat_nome',
    ];

    /**
     * Relacionamento com a tabela de despesas.
     *
     * @return HasMany
     */
    public function despesas(): HasMany
    {
        return $this->hasMany(Despesa::class, 'cat_id', 'cat_id');
    }
}
