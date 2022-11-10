<?php

namespace App\Http\Controllers;

use App\Models\TipoDespesa;
use App\Models\Despesa;
use App\Models\Receita;
use DateTime;

use App\Repositories\Contracts\ITipoDespesaRepository;
use App\Repositories\Contracts\IDespesaRepository;
use App\Repositories\Contracts\IReceitaRepository;
use App\Repositories\Contracts\ICartaoRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public ITipoDespesaRepository $tipoDespesa;
    public IDespesaRepository $despesa;
    public IReceitaRepository $receita;
    public ICartaoRepository $cartao;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ITipoDespesaRepository $tipoDespesa,
        IDespesaRepository $despesa,
        IReceitaRepository $receita,
        ICartaoRepository $cartao
    )
    {
        $this->middleware('auth');
        $this->tipoDespesa = $tipoDespesa;
        $this->despesa = $despesa;
        $this->receita = $receita;
        $this->cartao = $cartao;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $cartaos = $this->cartao->all();

        //variáveis para gráfico
        $tipos = [];
        $valores = [];
        $receitaValida= [];
        $somaReceita = 0;
        $somaDespesa = 0;

        $tipos[0] = 'Receita';
        $tipos[1] = "Despesa";
        
        //campos de pesquisa cartão e data
        $cartaoID = request('cartao_id');
        $search = $request->get('search');
                
        //select e condição
        $receitas = Receita::whereYear(
            'created_at','=', date('Y', strtotime($search)))
            ->whereMonth('created_at','=', date('m', strtotime($search)))
            ->where('cartaoId', '=', $cartaoID)
            ->get();
        $despesas = Despesa::whereYear(
            'created_at','=', date('Y', strtotime($search)))
            ->whereMonth('created_at','=', date('m', strtotime($search)))
            ->where('cartaoId', '=', $cartaoID)
            ->get();

        foreach($receitas as $item){
            $somaReceita += $item['valor'];
        }
        foreach($despesas as $item){
            $somaDespesa += $item['valor'];
        }

        $valores[0] = $somaReceita;
        $valores[1] = $somaDespesa;
        
        $buscas = $valores;

        $balanco = $valores[0] - $valores[1];
        return view('/Restrito/default', compact("buscas","search","valores","balanco","cartaos"));
    }
    public function grafico()
    {

    }
}
