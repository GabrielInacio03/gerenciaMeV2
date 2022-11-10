<?php
use App\Http\Controllers\CartaoController;
use App\Repositories\Contracts\ITipoDespesaRepository;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/Restrito/default', 'HomeController@index')->middleware('auth');



Route::resource('/Restrito/cartaos', 'CartaoController')->middleware('auth');
Route::resource('/Restrito/despesas', 'DespesaController')->middleware('auth');
Route::resource('/Restrito/receitas', 'ReceitaController')->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
