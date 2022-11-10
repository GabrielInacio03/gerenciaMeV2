<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cartao;
use App\Models\TipoDespesa;

class Despesa extends Model
{
    protected $table = 'despesas';

    protected $fillable = [
        'descricao',
        'valor',
        'cartaoId',
        'tipo',
    ];   

    public function cartao()
    {
        return $this->belongsTo(Cartao::class, 'cartaoId');
    }  
    public function tipoDespesa()
    {
        return $this->belongsTo(TipoDespesa::class, 'tipo');
    }
}
