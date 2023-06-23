<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CombinaSorte</title>
    <!-- FONTS DO GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">


        <!-- CSS BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- CSS DA APLICAÇÃO-->
        <link rel="stylesheet" href="/css/style.css">
      
</head>
<body>


<header>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbar">
                        <a href="/" class="navbar-brand">
                            <img src="/img/logo.png" class="img-navbar">
                        </a>
                        <ul class="navbar-nav">
                 
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{Auth::user()->name}}
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                          
                                            <li>
                                                <a class="dropdown-item" href="/user/password">Alterar Senha</a>
                                            </li>       
                                             
                                            <li>
                                            <form action="/logout" method="POST">
                                                @csrf 
                                                <a href="/logout"
                                                    class="dropdown-item"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    Sair
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                            </li>         
                        </ul>
                    </div>
                </nav>
            </header>

            <main>
                           <div class="row">
                           @if(session('msg'))
                                    <p class="msg-align @if(session('class'))alert alert-{{session('class')}}@else msg @endif">{{session('msg')}}</p>
                                @endif
                               
                                
                           </div>

             
                           
                <div class="tela">
                    @yield('content')
                </div> 
            </main>
           
      


<!-- script bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.1/tableExport.min.js"></script> @yield('script')
     <!-- SCRIPT DA APLICAÇÃO-->
      <script src="/js/script.js"></script>
    <!-- icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>
</html>