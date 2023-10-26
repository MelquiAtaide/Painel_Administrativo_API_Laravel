<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CIPE-ESF Cadastrar</title>
    {{-- css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href=""> --}}
</head>
<body>
    <main>
        <div class="erros">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('sucesso'))
                <div class="alert alert-success">
                    {{ session('sucesso') }}
                </div>
            @endif
        </div>
        <div class="login-container">
            <form class="formulario" action="{{route('cadastrar')}}" method="POST">
                @csrf
                <h1 class="d-flex justify-content-center align-items-center">Cadastrar</h1>
                <div class="mb-3">
                    <label class="form-label" for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo" value="{{old('nome')}}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail" value="{{old('email')}}">
                </div>
                <div class="mb-3 d-flex flex-column">
                    <label class="form-label" for="perfil">Perfil</label>
                    <select class="form-select perfil" name="perfil" id="perfil">
                        <option disabled selected>Selecionar</option>
                        @foreach ($perfis as $perfil)
                            <option value="{{$perfil->id}}">{{$perfil->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="confirmar-senha">Confirmar Senha</label>
                    <input type="password" class="form-control" name="confirmar-senha" placeholder="Digite sua senha novamente">
                </div>
                <div class="botao-container">
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
