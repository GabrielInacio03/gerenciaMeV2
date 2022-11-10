<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoReceita extends Model
{
    protected $table = 'tipo_receitas';

    protected $fillable = [
        'nome',        
    ];  
}
