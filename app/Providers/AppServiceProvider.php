<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\ICartaoRepository','App\Repositories\Eloquent\CartaoRepository');
        $this->app->bind('App\Repositories\Contracts\IDespesaRepository','App\Repositories\Eloquent\DespesaRepository');
        $this->app->bind('App\Repositories\Contracts\IReceitaRepository','App\Repositories\Eloquent\ReceitaRepository');
        $this->app->bind('App\Repositories\Contracts\ITipoReceitaRepository','App\Repositories\Eloquent\TipoReceitaRepository');
        $this->app->bind('App\Repositories\Contracts\ITipoDespesaRepository','App\Repositories\Eloquent\TipoDespesaRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
