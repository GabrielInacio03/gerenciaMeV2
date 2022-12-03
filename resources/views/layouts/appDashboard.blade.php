<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <title>{{ config('app.name', 'GerenciaMe') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- CSS3 -->

    <!-- Chartjs -->

    <style>
       button.navbar-toggler .position-relative .d-md-none .collapsed{
        color: #FFF;
        background-color: #FFF;
       }
        #principal{
            margin: 0 auto;
        }
        body {
            overflow-x: hidden;
            /* Hide horizontal scrollbar */
        }

        .nav-link {
            color: #FFF;
        }

        .nav-link:hover {
            color: #37169c;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- {{ config('app.name', 'GerenciaMe') }} -->
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg  bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Gerencia<sup>Me</sup></a>
            <button class="navbar-toggler position-relative d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">                   
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ URL::asset('/Restrito/default') }}">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::asset('/Restrito/cartaos') }}" class="nav-link" aria-current="page">
                            <span data-feather="credit-card"></span>
                            Cartões
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::asset('/Restrito/despesas') }}" class="nav-link" aria-current="page">
                            <span data-feather="arrow-down-circle"></span>
                            Despesas
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ URL::asset('/Restrito/receitas') }}" class="nav-link" aria-current="page">
                            <span data-feather="arrow-up-circle"></span>
                            Receitas
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a href="{{ URL::asset('/Restrito/alteradados') }}" class="nav-link">Perfil</a>
                    </li>
                </ul>
                <div class="nav-item text-nowrap" style="display: flex;">
                    
                    
                    <a href="#" class="nav-link px-3">{{auth()->user()->name}}</a>
                    @auth                
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout"
                        class="nav-link px-3"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">Sair</a>
                    </form>
                                
                    @endauth
                
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <main class="col-md-8 " id="principal">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>


</html>