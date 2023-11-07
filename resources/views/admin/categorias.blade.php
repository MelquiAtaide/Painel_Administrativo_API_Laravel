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
        <h1 class="titulo">Categorias cadastradas</h1>
        <button type="button" class="adicionar-novo" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            <i class="fa-regular fa-square-plus icone-adicionar-novo"></i>Cadastrar novas categorias
        </button>
        <!-- Modal -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastre uma nova categoria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('cadastrar.categorias')}}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label" for="sigla">Sigla</label>
                                <input type="text" class="form-control" name="sigla" placeholder="Digite a sigla" value="{{old('sigla')}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="descricao">Decrição</label>
                                <input type="text" class="form-control" name="descricao" placeholder="Digite a descrição" value="{{old('descricao')}}" required>
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
                    <th scope="col">Sigla</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->sigla}}</td>
                        <td>{{$categoria->descricao}}</td>
                        <td class="td-acao">
                            <button type="button" class="editar" data-bs-toggle="modal" data-bs-target="#modalEditar-{{$categoria->id}}">
                                <i class="fa-solid fa-pen-to-square icone-tabela"></i>
                            </button>
                            <!-- Modal  para editar -->
                            <div class="modal fade" id="modalEditar-{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edite uma nova categoria</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('editar.categoria', $categoria->id)}}" method="POST" class="form-editar">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-2">
                                                    <label class="form-label" for="sigla">Sigla</label>
                                                    <input type="text" class="form-control" name="sigla" placeholder="Digite a sigla" value="{{$categoria->sigla}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="descricao">Decrição</label>
                                                    <input type="text" class="form-control" name="descricao" placeholder="Digite a descrição" value="{{$categoria->descricao}}">
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
                            {{-- botão de deletar --}}
                            <form action="{{route('deletar.categoria', $categoria->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-deletar" type="button" data-bs-toggle="modal" data-bs-target="#modalDeletar-{{$categoria->id}}"><i class="fa-solid fa-trash icone-tabela"></i></button>
                                {{-- modal para deletar --}}
                                <div class="modal fade" id="modalDeletar-{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza que deseja deletar essa categoria?</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                          <button type="submit" class="btn-salvar">Sim</button>
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
