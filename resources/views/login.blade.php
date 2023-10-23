<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CIPE-ESF Login</title>
    {{-- css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <main>
        <div class="login-container">
            <form class="formulario" action="{{route('logar')}}" method="POST">
                @csrf
                <h1 class="d-flex justify-content-center align-items-center">Login</h1>
                <div class="mb-3">
                    <label class="form-label" for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha">
                </div>
                <div class="botao-container">
                    <button class="btn btn-primary" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
