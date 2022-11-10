<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table = 'cartaos';

    protected $fillable = [
        'nome',
        'userId'
    ];   
    
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }    
}
