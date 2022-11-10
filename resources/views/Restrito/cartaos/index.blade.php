@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cartões</h1>   
</div>
<div class="row">
    <div class="col-md-12">
        <!-- 
            @if(count($cartaos) < 1)
                <a href="{{ url('/Restrito/cartaos/create') }}" class="btn btn-success">Novo</a>       
            @endif  
        -->
        <a href="{{ url('/Restrito/cartaos/create') }}" class="btn btn-success">Novo</a>       
        @if(session()->get('success'))
        <div class="alert alert-success mt-1">
            {{ session()->get('success') }}  
        </div><br />
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-9">Nome</th>
                    <th class="col-md-2">Ações</th>
                </tr>
            </thead>  
            <tbody>
            @foreach($cartaos as $cartao)
                <tr>
                    <td class="col-md-1">{{$cartao->id}}</td>
                    <td class="col-md-9">{{$cartao->nome}}</td>                    
                    <td class="col-md-2">
                        <a href="{{ route('cartaos.edit', $cartao->id)}}" class="btn btn-primary mb-1">                            
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('cartaos.destroy', $cartao->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                            <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        
                    </td>
                </tr>
            @endforeach
            </tbody>      
        </table>
    </div>
</div>
@endsection