<?php

    namespace App\Repositories\Contracts;

    interface IDespesaRepository
    {
        public function all();
        public function store($model);
        public function update($model);
        public function delete($model);
        public function getById($id);
    }