<?php
namespace App\Repositories\Eloquent;

use App\Models\Despesa;
use App\Repositories\Contracts\IDespesaRepository;

class DespesaRepository extends RepositoryBase implements IDespesaRepository
    {
        protected $model = Despesa::class;
       
    }