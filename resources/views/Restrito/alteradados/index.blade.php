@extends('layouts.appDashboard')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Alterar Dados</h1>    
</div>
<div class="card">
    <div class="card-head">    
    @if(session()->get('errors'))
        <div class="alert alert-danger mt-1">
            {{ session()->get('errors') }}  
        </div><br />
    @endif
    </div>
    <div class="card-body">
        <label for="txtNome" class="form-label">Nome: {{ $user->name }}</label>
        <br>
        <label for="txtEmail" class="form-label">E-mail: {{ $user->email }}</label>
        <br>        
        <a href="{{ route('alteradados.edit', $user->id)}}" class="btn btn-primary mb-1">                            
                            <i class="bi bi-pencil-square"></i>Editar
                        </a>
    </div>
</div>

@endsection