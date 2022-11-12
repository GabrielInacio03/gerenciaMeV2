<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\ICartaoRepository;
use App\Repositories\Contracts\IDespesaRepository;
use App\Repositories\Contracts\ITipoDespesaRepository;
use Illuminate\Http\Request;

class AlterarDadosController extends Controller
{
    public IDespesaRepository $despesa;
    public ICartaoRepository $cartao;
    public ITipoDespesaRepository $tipo;

    public function __construct(
        IDespesaRepository $despesa,
        ICartaoRepository $cartao,
        ITipoDespesaRepository $tipo
    )
    {
        $this->despesa = $despesa;
        $this->cartao = $cartao;
        $this->tipo = $tipo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();    
        return view('/Restrito/alteradados/index', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        return view('/Restrito/alteradados/edit', compact('user'));
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $validacao = $user;
        $validacao->name = $request->input('nome');
        $validacao->email = $request->input('email');
        $validacao->password = Hash::make($request->input('senha'));

        if(strlen($validacao->name) < 1 || strlen($validacao->password) < 1 )
        {
            return redirect('/Restrito/alteradados/'.$id.'/edit')->with('errors', 'Algum campo não foi preenchido corretamente');
        }
        else
        {
            $validacao->save();
            return redirect('/Restrito/alteradados')->with('success', 'Perfil editado com sucesso');
        }
    }

}
