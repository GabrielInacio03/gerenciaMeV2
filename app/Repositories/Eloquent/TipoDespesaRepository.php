<?php

namespace App\Repositories\Eloquent;
use App\Models\TipoDespesa;
use App\Repositories\Contracts\ITipoDespesaRepository;

class TipoDespesaRepository extends RepositoryBase implements ITipoDespesaRepository
    {
        protected $model = TipoDespesa::class;
       
    }