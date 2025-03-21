<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Despesa extends Model
{
    protected $table = 'des_despesa';
    protected $primaryKey = 'des_id';


    protected $fillable = [
        'des_valor',
        'des_descricao',
        'des_data',
        'cat_id',
        'usu_id'
    ];


    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'cat_id', 'cat_id');
    }


    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'usu_id', 'usu_id');
    }
}


