<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Repositories\Contracts\ICartaoRepository;
use App\Repositories\Contracts\IDespesaRepository;
use App\Repositories\Contracts\ITipoDespesaRepository;
use Illuminate\Http\Request;

class DespesaController extends Controller
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
        $despesas = $this->despesa->all();
        $tipos = $this->tipo->all();
        return view('/Restrito/despesas/index', compact('despesas','tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartaos = $this->cartao->all();
        $tipos = $this->tipo->all();
        return view('/Restrito/despesas/create', compact('cartaos','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = new Despesa();
        $validacao->descricao = $request->descricao;
        $validacao->valor = $request->valor;
        $validacao->tipo = $request->tipo;
        $validacao->cartaoId = $request->cartao_id;

        //validação
        if(strlen($validacao->descricao) < 1 || $validacao->tipo == 0 || $validacao->cartaoId == 0)
        {
            return redirect('/Restrito/despesas/create')->with('errors', 'Algum campo não foi preenchido corretamente');
        }
        else
        {
            $this->despesa->store($validacao);
            return redirect('/Restrito/despesas')->with('success', 'despesa criada com sucesso');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $despesa = $this->despesa->getById($id);
        $tipos = $this->tipo->all();
        $cartaos = $this->cartao->all();

        return view('/Restrito/despesas/edit', compact('despesa', 'cartaos', 'tipos'));
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
        $validacao = $this->despesa->getById($id);
        $validacao->descricao = $request->input('descricao');
        $validacao->valor = $request->input('valor');
        $validacao->tipo = $request->input('tipo');
        $validacao->cartaoId = $request->input('cartao_id');

        if(strlen($validacao->descricao) < 1 || $validacao->tipo == 0 || $validacao->cartaoId == 0)
        {
            return redirect('/Restrito/despesas/'.$id.'/edit')->with('errors', 'Algum campo não foi preenchido corretamente');
        }
        else
        {
            $this->despesa->update($validacao);
            return redirect('/Restrito/despesas')->with('success', 'Despesa editada com sucesso');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = $this->despesa->getById($id);
        $this->despesa->delete($despesa);

        return redirect('/Restrito/despesas')->with('success','Despesa excluida com sucesso');
    }
}
