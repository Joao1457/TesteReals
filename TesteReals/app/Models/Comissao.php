<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Afiliado;


use Illuminate\Database\Eloquent\Model;

class Comissao extends Model
{
    use HasFactory;

    protected $table = 'comissoes';

    protected $fillable = [
        'afiliado_id',
        'valor',
        'data',
    ];


    public function afiliado()
    {
        return $this->belongsTo(Afiliado::class);
    }
}
