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
        <form class="row g-3" method="POST" action="{{ route('alteradados.update', $user->id) }}">
        @csrf
        @method('PATCH')
            <div class="col-md-6">
                <label for="txtNome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="txtNome" name="nome" value="{{ $user->name }}">
            </div>      
            <div class="col-md-6">
                <label for="txtEmail" class="form-label">E-mail:</label>
                <input type="text" class="form-control" id="txtEmail" name="email" value="{{ $user->email }}">
            </div> 
            <div class="col-md-6">
                <label for="txtSenha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="txtSenha" name="senha">
            </div> 
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
        </form>
    </div>
</div>

@endsection