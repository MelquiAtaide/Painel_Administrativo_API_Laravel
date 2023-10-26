<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIPE-ESF</title>
    {{-- css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/conteudo.css') }}">
    {{-- icones --}}
    <link rel="stylesheet" href="{{ asset('Icons/fontawesome-free-6.4.2-web/css/all.min.css')}}">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <header class="navBar">
        {{-- <div class="img-container">
            <img src="{{asset('assets/logo.png')}}" alt="">
        </div> --}}
        <nav>
            <ul>
                {{-- <li><a href="{{ route('redirecionar.dashboard') }}">Home</a></li> --}}
                <li><i class="fa-solid fa-user" style="color: #ffffff;font-size:35px;"></i></li>
            </ul>
        </nav>
    </header>
    <div class="navLateral">
        <nav>
            <ul>
                <li><div class="lista-container"></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="{{route('redirecionar.usuarios')}}"><i class="fa-solid fa-users icone-lateral"></i>Usuários</a></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="{{route('listar.conceitos')}}"><i class="fa-regular fa-rectangle-list icone-lateral"></i>Conceitos</a></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="{{route('listar.categorias')}}"><i class="fa-regular fa-rectangle-list icone-lateral"></i>Categorias</a></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="#"><i class="fa-solid fa-right-from-bracket icone-lateral"></i>Sair</a></div></li>
                <hr class="linha">
            </ul>
        </nav>
    </div>
    <main class="content">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
