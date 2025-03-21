<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usr_usuario';
    protected $primaryKey = 'usr_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'usr_nome',
        'usr_email',
        'usr_senha',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'usr_senha',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'usr_senha' => 'hashed',
    ];

    /**
     * Relacionamento com a tabela de despesas.
     *
     * @return HasMany
     */
    public function despesas(): HasMany
    {
        return $this->hasMany(Despesa::class, 'usr_id', 'usr_id');
    }
}
