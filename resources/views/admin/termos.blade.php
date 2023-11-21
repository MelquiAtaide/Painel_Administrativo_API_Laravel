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
        <h1 class="titulo">Termos cadastrados</h1>
        <button type="button" class="adicionar-novo" data-bs-toggle="modal" data-bs-target="#modalCadastrar">
            <i class="fa-regular fa-square-plus icone-adicionar-novo"></i>Cadastrar novo termo
        </button>
        <!-- Modal de cadastrar -->
        <div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Termo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('cadastrar.termo')}}" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label" for="categoria">Categoria</label>
                                <select class="form-select" name="categoria" id="categoria">
                                    <option disabled selected>Selecionar</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->sigla}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="foco">Foco</label>
                                <select class="form-select" name="foco" id="foco">
                                    <option disabled selected>Selecionar</option>
                                    @foreach ($focos as $foco)
                                        <option value="{{$foco->id}}">{{$foco->nome_eixo}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2 d-flex flex-column">
                                <label class="form-label" for="julgamento">Julgamento</label>
                                <select class="form-select" name="julgamento" id="julgamento">
                                    <option disabled selected>Selecionar</option>
                                    @foreach ($julgamentos as $julgamento)
                                        <option value="{{$julgamento->id}}">{{$julgamento->nome_eixo}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="acao">Ação</label>
                                <select class="form-select" name="acao" id="acao">
                                    <option disabled selected>Selecionar</option>
                                    @foreach ($acoes as $acao)
                                        <option value="{{$acao->id}}">{{$acao->nome_eixo}}</option>
                                    @endforeach
                                </select>
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
    <div class="container-filtro">
        <form action="{{route('filtrar.termos')}}" method="GET">
            @csrf
            <select name="filtrarTermos" id="filtrarTermos" class="form-select">
                <option selected disabled hidden value="">Filtrar por categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->sigla}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn-filtrar">Filtrar</button>
        </form>
    </div>
    <div class="tabela-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Categoria</th>
                    <th scope="col">Foco</th>
                    <th scope="col">Julgamento</th>
                    <th scope="col">Alvo</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($termos as $termo)
                    <tr>
                        <td>{{$termo->categoria->sigla}}</td>
                        <td>{{$termo->foco->nome_eixo}}</td>
                        <td>{{$termo->julgamento->nome_eixo ?? ''}}</td>
                        <td>{{$termo->acao->nome_eixo ?? ''}}</td>
                        <td class="td-acao">

                            <button type="button" class="editar" data-bs-toggle="modal" data-bs-target="#modalEditar-{{$termo->id}}">
                                <i class="fa-solid fa-pen-to-square icone-tabela"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalEditar-{{$termo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Termo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('editar.termo', $termo->id)}}" method="POST" class="form-editar">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-2">
                                                    <label class="form-label" for="categoria">Categoria</label>
                                                    <select class="form-select" name="categoria" id="categoria">
                                                        <option disabled selected>Selecionar</option>
                                                        @foreach ($categorias as $categoria)
                                                            @php
                                                                $selecionado = $categoria->id == $termo->categoria_id;
                                                            @endphp
                                                            <option value="{{$categoria->id}}" {{ $selecionado ? 'selected' : '' }}>
                                                                {{$categoria->sigla}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="foco">Foco</label>
                                                    <select class="form-select" name="foco" id="foco">
                                                        <option disabled selected>Selecionar</option>
                                                        @foreach ($focos as $foco)
                                                            @php
                                                                $selecionado = $foco->id == $termo->foco_id;
                                                            @endphp
                                                            <option value="{{$foco->id}}" {{ $selecionado ? 'selected' : '' }}>
                                                                {{$foco->nome_eixo}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($termo->julgamento_id)
                                                    <div class="mb-2 d-flex flex-column">
                                                        <label class="form-label" for="julgamento">Julgamento</label>
                                                        <select class="form-select" name="julgamento" id="julgamento">
                                                            <option disabled selected>Selecionar</option>
                                                            @foreach ($julgamentos as $julgamento)
                                                                @php
                                                                    $selecionado = $julgamento->id == $termo->julgamento_id;
                                                                @endphp
                                                                <option value="{{$julgamento->id}}" {{ $selecionado ? 'selected' : '' }}>
                                                                    {{$julgamento->nome_eixo}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                                @if ($termo->acao_id)
                                                    <div class="mb-2 d-flex flex-column">
                                                        <label class="form-label" for="acao">Ação</label>
                                                        <select class="form-select" name="acao" id="acao">
                                                            <option disabled selected>Selecionar</option>
                                                            @foreach ($acoes as $acao)
                                                                @php
                                                                    $selecionado = $acao->id == $termo->acao_id;
                                                                @endphp
                                                                <option value="{{$acao->id}}" {{ $selecionado ? 'selected' : '' }}>
                                                                    {{$acao->nome_eixo}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="botoesModal">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn-salvar">Salvar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('deletar.termo', $termo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-deletar" type="button" data-bs-toggle="modal" data-bs-target="#modalDeletar-{{$termo->id}}"><i class="fa-solid fa-trash icone-tabela"></i></button>
                                {{-- modal para deletar --}}
                                <div class="modal fade" id="modalDeletar-{{$termo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Tem certeza que deseja deletar esse termo?</h1>
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
        <div>
            {{$termos->appends(['filtrarTermos' => $categoriaId])->links()}}
        </div>
    </div>
</div>

@endsection
