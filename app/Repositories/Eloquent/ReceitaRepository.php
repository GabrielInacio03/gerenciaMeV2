<?php
namespace App\Repositories\Eloquent;

use App\Models\Receita;
use App\Repositories\Contracts\IReceitaRepository;

class ReceitaRepository extends RepositoryBase implements IReceitaRepository
    {
        protected $model = Receita::class;
       
    }