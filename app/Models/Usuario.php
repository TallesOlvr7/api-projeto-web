<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    protected $table = 'usu_usuario';
    protected $primaryKey = 'usu_id';


    protected $fillable = [
        'usu_nome',
        'usu_email',
        'usu_senha',
    ];


    protected $hidden = [
        'usu_senha',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'usu_senha' => 'hashed',
    ];

    public function despesas(): HasMany
    {
        return $this->hasMany(Despesa::class, 'usu_id', 'usu_id');
    }
}
