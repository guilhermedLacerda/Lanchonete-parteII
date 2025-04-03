<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
        'cpf',
        'email',
        'senha' // Laravel espera "password" e não "senha"
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Um cliente pertence a um usuário
    }


}
