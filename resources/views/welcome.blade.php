<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GerenciaMe</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        
        <!-- Bootstrap 5.1.3 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
       
        <!-- Style -->
        <style>
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
            .nav-link{
                color: #FFF;
                font-size: 18px;
            }
            .nav-link:hover{    
                font-weight: bolder;            
                text-decoration: underline;
                color: #FFF;
            }
            
        </style>
    </head>
    <body class="d-flex h-100 text-center text-white bg-dark">       
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto mb-5 flex-column">
            <header class="mb-auto">
                <div class="container">
                    <h3 class="float-md-start mb-0">GerenciaMe</h3>
                    <nav class="nav nav-masthead justify-content-center float-md-end">
                    @if(Route::has('login'))
                        @auth                        
                            <a class="nav-link active text-light" aria-current="page" href="{{ url('/Restrito/default') }}">Dashboard</a>
                        @else
                            @if(Route::has('register'))
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                            <a class="nav-link" href="{{ url('register') }}">Cadastrar</a>
                            @endif
                        @endauth
                    @endif
                    
                    </nav>
                </div>
            </header>
           
            <main class="px-3">
                <div class="container">
                    <h1>Página Inicial.</h1>
                    <p class="lead">Bem vindos ao nosso sistema de gerenciamento financeiro. Faça o controle de seus gastos com mais eficácia.</p>
                    <p class="lead">
                        <a href="{{ url('/Restrito/default') }}" type="button" class="btn btn-outline-light btn-lg">Começar</a>
                    </p>
                </div>
            </main>
            
            <footer class="mb-0 m-auto text-white-50" id="rodape">
                <div class="container">
                    <p>Cover template for <a href="https://getbootstrap.com/" class="text-white ">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
                </div>
                
            </footer>
        </div> 
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>      
    </body>
</html>