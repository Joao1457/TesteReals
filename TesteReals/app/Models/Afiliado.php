<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Comissao;




class Afiliado extends Model
{
    use HasFactory;

    protected $table = 'afiliados';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'status',
    ];

    public function comissoes()
    {
        return $this->hasMany(Comissao::class, 'afiliado_id');
    }
}
