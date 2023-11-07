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
        <h1 class="titulo">Eixos cadastrados</h1>
        <button type="button" class="adicionar-novo" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            <i class="fa-regular fa-square-plus icone-adicionar-novo"></i>Cadastrar novos eixos
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastre um novo eixo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('cadastrar.eixo')}}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label" for="tipo_eixo">Tipo</label>
                                <select class="form-select categoria" name="tipo_eixo" id="tipo_eixo">
                                    <option disabled selected>Selecionar</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->nome_tipo}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="nome_eixo">Nome</label>
                                <input type="text" class="form-control" name="nome_eixo" placeholder="Digite o eixo aqui" value="{{old('nome_eixo')}}" required>
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
                    <th scope="col">Tipo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eixos as $eixo)
                    <tr>
                        <td>{{$eixo->tipos->nome_tipo}}</td>
                        <td>{{$eixo->nome_eixo}}</td>
                        <td class="td-acao">
                            <button type="button" class="editar" data-bs-toggle="modal" data-bs-target="#modalEditar-{{ $eixo->id }}">
                                <i class="fa-solid fa-pen-to-square icone-tabela"></i>
                            </button>
                            <form action="{{route('deletar.eixo', $eixo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn-deletar" type="button" data-bs-toggle="modal" data-bs-target="#modalDeletar-{{$eixo->id}}"><i class="fa-solid fa-trash icone-tabela"></i></button>
                                {{-- modal para deletar --}}
                                <div class="modal fade" id="modalDeletar-{{$eixo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza que deseja deletar esse eixo?</h1>
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
                            {{-- modal para editar --}}
                            <div class="modal fade" id="modalEditar-{{ $eixo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edite o eixo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('editar.eixo', $eixo->id)}}" method="POST" style="display: block">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-2">
                                                    <label class="form-label" for="tipo_eixo">Tipo</label>
                                                    <select class="form-select categoria" name="tipo_eixo" id="tipo_eixo">
                                                        @foreach ($tipos as $tipo)
                                                            @php
                                                                $selecionado = $tipo->id == $eixo->tipo_id;
                                                            @endphp
                                                            <option value="{{ $tipo->id }}" {{ $selecionado ? 'selected' : '' }}>
                                                                {{ $tipo->nome_tipo }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="nome_eixo">Nome</label>
                                                    <input type="text" class="form-control" name="nome_eixo" placeholder="Digite o eixo aqui" value="{{$eixo->nome_eixo}}">
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
