@extends('layouts.main')

@section('content')

<div class="container-conteudo">
    <div class="erros-conteudo">
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
    <div class="header-conteudo">
        <h1 class="titulo">Usuários cadastrados</h1>
        <button type="button" class="adicionar-novo" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            <i class="fa-regular fa-square-plus icone-adicionar-novo"></i>Cadastrar novo usuário
        </button>
        <!-- Modal de cadastrar -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Usuário</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('cadastrar.usuario')}}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label" for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo" value="{{old('nome')}}" required>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail" value="{{old('email')}}" required>
                            </div>
                            <div class="mb-2 d-flex flex-column">
                                <label class="form-label" for="perfil">Perfil</label>
                                <select class="form-select perfil" name="perfil" id="perfil">
                                    <option disabled selected>Selecionar</option>
                                    @foreach ($perfis as $perfil)
                                        <option value="{{$perfil->id}}">{{$perfil->descricao}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="senha">Senha</label>
                                <input type="password" class="form-control" name="senha" placeholder="Digite sua nova senha" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="confirmar-senha">Confirmar Senha</label>
                                <input type="password" class="form-control" name="confirmar-senha" placeholder="Digite sua senha novamente" required>
                            </div>
                            <div class="botoesModal">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn-salvar">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tabela-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->perfil->descricao}}</td>
                        <td class="td-acao">

                            <button type="button" class="editar" data-bs-toggle="modal" data-bs-target="#modalEditar-{{$usuario->id}}">
                                <i class="fa-solid fa-pen-to-square icone-tabela"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalEditar-{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Usuário</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('editar.usuario', $usuario->id)}}" method="POST" class="form-editar">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-2">
                                                    <label class="form-label" for="nome">Nome</label>
                                                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo" value="{{$usuario->nome}}">
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="email">E-mail</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail" value="{{$usuario->email}}">
                                                </div>
                                                <div class="mb-2 d-flex flex-column">
                                                    <label class="form-label" for="perfil">Perfil</label>
                                                    <select class="form-select perfil" name="perfil" id="perfil">
                                                        @foreach ($perfis as $perfil)
                                                            @php
                                                                $selecionado = $perfil->id == $usuario->perfil_id;
                                                            @endphp
                                                            <option value="{{ $perfil->id }}" {{ $selecionado ? 'selected' : '' }}>
                                                                {{ $perfil->descricao }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="senha">Senha</label>
                                                    <input type="password" class="form-control" name="senha" placeholder="Digite sua nova senha" value="{{$usuario->senha}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="confirmar-senha">Confirmar Senha</label>
                                                    <input type="password" class="form-control" name="confirmar-senha" placeholder="Digite sua senha novamente" value="{{$usuario->senha}}">
                                                </div>
                                                <div class="botoesModal">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn-salvar">Salvar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('deletar.usuario', $usuario->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-deletar" type="button" data-bs-toggle="modal" data-bs-target="#modalDeletar-{{$usuario->id}}"><i class="fa-solid fa-trash icone-tabela"></i></button>
                                {{-- modal para deletar --}}
                                <div class="modal fade" id="modalDeletar-{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza que deseja deletar esse usuário?</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                          <button type="submit" class="btn btn-primary">Sim</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
