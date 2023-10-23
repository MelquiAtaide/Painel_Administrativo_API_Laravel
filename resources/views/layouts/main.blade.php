<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIPE-ESF</title>
    {{-- css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    {{-- icones --}}
    <link rel="stylesheet" href="{{ asset('Icons/fontawesome-free-6.4.2-web/css/all.min.css')}}">

</head>
<body>
    <header class="navBar">
        <nav>
            <ul>
                <li><a href="{{ route('redirecionarDashboard') }}">Home</a></li>
                <li><i class="fa-solid fa-user" style="color: #ffffff;font-size:35px;"></i></li>
            </ul>
        </nav>
    </header>
    <div class="navLateral">
        <nav>
            <ul>
                <li><div class="lista-container"><a href="#"><i class="fa-solid fa-users icone-lateral"></i>Usuários</a></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="#"><i class="fa-regular fa-rectangle-list icone-lateral"></i>Termos</a></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="#"><i class="fa-regular fa-rectangle-list icone-lateral"></i>Eixos</a></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="#"><i class="fa-regular fa-rectangle-list icone-lateral"></i>Categorias</a></div></li>
                <hr class="linha">
                <li><div class="lista-container"><a href="#"><i class="fa-solid fa-right-from-bracket icone-lateral"></i>Sair</a></div></li>
                <hr class="linha">
            </ul>
        </nav>
    </div>
    <main class="content">
        @yield('content')
    </main>
    <footer></footer>
</body>

</html>
