@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Receitas</h1>   
</div>
<div class="row">
    <div class="col-md-12">
        <a href="{{ url('/Restrito/receitas/create') }}" class="btn btn-success">Novo</a>  
        @if(session()->get('success'))
        <div class="alert alert-success mt-1">
            {{ session()->get('success') }}  
        </div><br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-4">Descrição</th>
                    <th class="col-md-3">Tipo</th>
                    <th class="col-md-2">Valor</th>
                    <th class="col-md-2">Ações</th>
                </tr>            
            </thead>
            <tbody> 
                @foreach($receitas as $receita)                              
                <tr>
                    <td class="col-md-1">{{$receita->id}}</td>
                    <td class="col-md-4">{{$receita->descricao}}</td>
                    <td class="col-md-3">{{$receita->tipoReceita->nome}}</td>
                    <td class="col-md-2">R${{$receita->valor}}</td>
                    <td class="col-md-2">
                        <a href="{{ route('receitas.edit', $receita->id) }}" class="btn btn-primary mb-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>                
                        <form action="{{ route('receitas.destroy', $receita->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection