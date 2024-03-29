@extends('layouts.appDashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <h3 class="h3 text-center">Dashboard</h3>        
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div id="container-search" class="col-md-12">
            <h5>Filtrar por:</h5>
            <form action="/Restrito/default" method="GET">
                <div class="row">
                    <div class="col-md-12" style="display: flex;">
                        <div class="col-md-4">
                            <input type="month" id="search" name="search" class="form-control" placeholder="Procure um Evento">
                        </div>
                        <div class="col-md-5 px-3">                            
                            <select class="form-control" name="cartao_id" required>
                                <option value="0">--- Selecione um Cartão ---</option>
                                @foreach($cartaos as $cartao)
                                    <option value="{{ $cartao->id }}">{{ $cartao->nome }}</option>
                                @endforeach
                            </select>
                        </div>                        
                    </div>                    
                </div>        
                <br>        
                <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">Pesquisar</button>
            </form>
        </div>

    </div>
</div>
<br>
<div class="card m-b-20">
    <div class="card-body">
        <h6 class="mt-0 header-title mb-3">Balanço Mensal</h6>
        <hr>
        <div class="inbox-wid">
            <div class="inbox-item">
                <div class="chart-container" style="position: relative; ">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    if(count($buscas) > 0)
    {
        $tipos = array_values($buscas);

        $lista = [];
        foreach($tipos as $tipo){
            $lista[] = $tipo;
        }
    }
@endphp
<script src="{{ asset('chart.js/chart.js') }}"></script>
<script>

    var ctx = document.getElementById('myChart').getContext('2d');

  const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ {!! implode(",", $lista) !!} ],
        datasets: [{
            label: {{ $balanco }},
            data: [ {{ implode(",", $valores) }} ],
            backgroundColor: [                
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderColor: [                                
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection