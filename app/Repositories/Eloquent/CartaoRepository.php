<?php

namespace App\Repositories\Eloquent;
use App\Models\Cartao;
use App\Repositories\Contracts\ICartaoRepository;

class CartaoRepository extends RepositoryBase implements ICartaoRepository
    {
        protected $model = Cartao::class;
       
    }