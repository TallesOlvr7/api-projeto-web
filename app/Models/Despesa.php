<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Despesa extends Model
{
    protected $table = 'dps_despesa';
    protected $primaryKey = 'dps_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'dps_valor',
        'dps_descricao',
        'dps_data',
        'cat_id',
        'usr_id'
    ];

    /**
     * Relacionamento com a tabela de categorias.
     *
     * @return BelongsTo
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'cat_id', 'cat_id');
    }

    /**
     * Relacionamento com a tabela de usuários.
     *
     * @return BelongsTo
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usr_id', 'usr_id');
    }
}


