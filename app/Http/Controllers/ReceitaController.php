<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Repositories\Contracts\ICartaoRepository;
use App\Repositories\Contracts\IReceitaRepository;
use App\Repositories\Contracts\ITipoReceitaRepository;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public IReceitaRepository $receita;
    public ICartaoRepository $cartao;
    public ITipoReceitaRepository $tipo;

    public function __construct(
        IReceitaRepository $receita,
        ICartaoRepository $cartao,
        ITipoReceitaRepository $tipo
    )
    {
        $this->receita = $receita;
        $this->cartao = $cartao;
        $this->tipo = $tipo;
    }

    public function index()
    {
        $receitas = $this->receita->all();
        $tipos = $this->tipo->all();

        return view('/Restrito/receitas/index', compact('receitas','tipos'));
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

        return view('/Restrito/receitas/create', compact('cartaos','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = new Receita();
        $validacao->descricao = $request->descricao;
        $validacao->valor = $request->valor;
        $validacao->tipo = $request->tipo;
        $validacao->cartaoId = $request->cartao_id;

        
        if(strlen($validacao->descricao) < 1 || $validacao->tipo == 0 || $validacao->cartaoId == 0)
        {
            return redirect('/Restrito/receitas/create')->with('errors', 'Algum campo não foi preenchido corretamente');
        }
        else
        {
            $this->receita->store($validacao);
            return redirect('/Restrito/receitas')->with('success', 'receita criada com sucesso');
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
        $receita = $this->receita->getById($id);
        $cartaos = $this->cartao->all();
        $tipos = $this->tipo->all();

        return view('/Restrito/receitas/edit', compact('receita', 'cartaos','tipos'));
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
        $validacao = $this->receita->getById($id);
        $validacao->descricao = $request->input('descricao');
        $validacao->valor = $request->input('valor');
        $validacao->tipo = $request->input('tipo');
        $validacao->cartaoId = $request->input('cartao_id');

        if(strlen($validacao->descricao) < 1 || $validacao->tipo == 0 || $validacao->cartaoId == 0)
        {
            return redirect('/Restrito/receitas/'.$id.'/edit')->with('errors', 'Algum campo não foi preenchido corretamente');
        }
        else
        {
            $this->receita->update($validacao);
            return redirect('/Restrito/receitas')->with('success', 'Receita editada com sucesso');
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
        $receita = $this->receita->getById($id);
        $this->receita->delete($receita);

        return redirect('/Restrito/receitas')->with('success','Receita excluida com sucesso');
    }
}
