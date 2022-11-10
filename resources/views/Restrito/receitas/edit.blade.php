@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Receita</h1>   
</div>
<div class="card">
    <div class="card-head">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    </div>
    <div class="card-body">
        <form class="row g-3" method="post" action="{{ route('receitas.update', $receita->id) }}">
        @csrf
        @method('PATCH')
            <div class="col-md-6">
                <label for="txtDescricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="txtDescricao" name="descricao" value="{{ $receita->descricao }}">
            </div>      
            <div class="col-md-6">
                <label for="txtValor" class="form-label">Valor:</label>
                <input type="number" class="form-control" id="txtValor" name="valor" step="0.010" value="{{ $receita->valor }}">
            </div>    
            <div class="col-md-4">
                <label for="txtTipo" class="form-label">Tipo</label>
                <select class="form-control" name="tipo" required>
                    <option value="0">--- Selecione uma opção ---</option>
                    @foreach($tipos as $tipo)
                        <option selected value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                    @endforeach
                </select>
            </div>  
            <div class="col-md-4">
                <label for="txtCartao" class="form-label">Cartão</label>
                <select class="form-control" name="cartao_id" required>
                    <option value="0">--- Selecione uma opção ---</option>                   
                    @foreach($cartaos as $cartao)                        
                        <option selected value="{{ $cartao->id }}">{{ $cartao->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>

@endsection