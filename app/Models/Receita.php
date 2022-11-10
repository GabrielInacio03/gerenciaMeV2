<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cartao;
use App\Models\TipoReceita;

class Receita extends Model
{
    protected $table = 'receitas';

    protected $fillable = [
        'descricao',
        'valor',
        'cartaoId',
        'tipo'
    ];   

    public function cartao()
    {
        return $this->belongsTo(Cartao::class, 'cartaoId');
    }  
    public function tipoReceita()
    {
        return $this->belongsTo(TipoReceita::class, 'tipo');
    } 
}
