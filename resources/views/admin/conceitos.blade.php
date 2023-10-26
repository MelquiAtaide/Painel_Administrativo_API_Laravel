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
        <h1 class="titulo">Conceitos cadastrados</h1>
        <button type="button" class="adicionar-novo" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            <i class="fa-regular fa-square-plus icone-adicionar-novo"></i>Cadastrar novos conceitos
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastre um novo conceito</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('cadastrar.conceitos')}}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label" for="categoria">Categoria</label>
                                <select class="form-select categoria" name="categoria" id="categoria">
                                    <option disabled selected>Selecionar</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->sigla}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="termo">Termo</label>
                                <input type="text" class="form-control" name="termo" placeholder="Digite um termo" value="{{old('termo')}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="definicao">Definição</label>
                                <input type="text" class="form-control" name="definicao" placeholder="Digite a definição" value="{{old('definicao')}}" required>
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
                    <th scope="col">Eixo</th>
                    <th scope="col">Termo</th>
                    <th scope="col">Definição</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conceitos as $conceito)
                    <tr>
                        <td>{{$conceito->categorias->sigla}}</td>
                        <td>{{$conceito->termo}}</td>
                        <td>{{$conceito->definicao}}</td>
                        <td class="td-acao">
                            <a href="#"><i class="fa-solid fa-pen-to-square icone-tabela"></i></a>
                            <form action="{{route('deletar.conceito', $conceito->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-deletar"><i class="fa-solid fa-trash icone-tabela"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
