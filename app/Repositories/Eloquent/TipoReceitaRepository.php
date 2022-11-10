<?php

namespace App\Repositories\Eloquent;
use App\Models\TipoReceita;
use App\Repositories\Contracts\ITipoReceitaRepository;

class TipoReceitaRepository extends RepositoryBase implements ITipoReceitaRepository
    {
        protected $model = TipoReceita::class;
       
    }