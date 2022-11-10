<?php

    namespace App\Repositories\Eloquent;

    abstract class RepositoryBase
    {
        protected $model;

        public function __construct()
        {
            $this->model = $this->resolveModel();
        }

        public function resolveModel()
        {
            return app($this->model);
        }
        public function all()
        {
            return $this->model->all();
        }
        public function store($model)
        {            
            $model->save();
        }
        public function update($model)
        {    
            $model->save();        
        }
        public function delete($model)
        {    
            $model->delete();        
        }
        public function getById($id)
        {
            return $this->model->findOrFail($id);
        }
    }