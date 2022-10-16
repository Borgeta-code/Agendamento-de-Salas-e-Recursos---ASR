<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    {{-- CSS Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- CSS da aplicação --}}
    <link rel="stylesheet" href="/css/styleMain.css">

    {{-- CSS Específico da página --}}
    @yield('css')

    {{-- Favicon do Site --}}
    <link rel="shortcut icon" href="/img/faviconASR.ico" type="image/x-icon">

</head>

<body>

    {{-- Cabeçalho da página --}}
    <header>
        <div class="header">
            <div class="navigation">
                <div><a id="home" href="/coordenacao/agendar">Agendar</a></div>
            </div>

            <div class="navigation">
                <div><a href="/coordenacao/agendamentos">Agendamentos</a></div>
            </div>

            <div class="navigation">
                <div><a href="/coordenacao">Coordenação</a></div>
            </div>

            <div class="exitButton">
                <button>
                    Sair
                </button>
            </div>

{{--
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Alterar Senha</a>
                    <a class="dropdown-item" href="#">Sair</a>
                </div>
            </div>
--}}
        </div>
    </header>


    {{-- -----------------------------------------HEADER MOBILE--------------------------------------------- --}}
    <div id="menuBar">
        <div id="menu" onclick="onClickMenu()">
            <div id="bar1" class="bar"></div>
            <div id="bar2" class="bar"></div>
            <div id="bar3" class="bar"></div>
        </div>
        <ul class="navigationMobile" id="navigationMobile">
            <li><a href="/coordenacao/agendar">AGENDAR</a></li>
            <li><a href="/coordenacao/agendamentos">AGENDAMENTOS</a></li>
            {{--
                <li><a href="/ocorrencia">OCORRÊNCIA</a></li>
                <li><a href="/alterarSenha">ALTERAR SENHA</a></li>
            --}}
            <li><a href="/coordenacao">COORDENAÇÃO</a></li>
            <li><a href="#">SAIR</a></li>
        </ul>
    </div>
    <div class="menuBg" id="menuBg"></div>

    <script src="/js/scriptHeader.js"></script>

    @yield('content')

    <footer>
        &copy; Todos os direitos reservados
    </footer>

    @yield('js')
    <script src="/js/scriptMain.js"></script>
</body>

</html>