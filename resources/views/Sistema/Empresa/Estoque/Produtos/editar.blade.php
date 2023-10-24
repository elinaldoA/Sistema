@extends('layouts.empresa')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Produtos') }}</h1>

    @if (session('success'))
        <div id="sucesso" class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('danger'))
        <div id="falha" class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col">
        <div class="col-lg-12 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Editar</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('produto.editar', ['produto' => $produto]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-12">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Geral</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Detalhes</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent"><br/>
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="codigo">Ativo</label>
                                                <input type="checkbox" name="active" value="1" class="form-control"
                                                    @if (
                                                        ($produto->active == 0 && old('active') && old('first_time')) ||
                                                            ($produto->active && old('active') == null && old('first_time') == null) ||
                                                            ($produto->active && old('active') && old('first_time'))) checked="checked" @endif>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="codigo">Código</label>
                                                <input type="text" class="form-control" name="codigo" id="codigo"
                                                    value="{{ $produto->codigo }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="nome">Nome</label>
                                                <input type="text" class="form-control" name="nome" id="nome"
                                                    value="{{ $produto->nome }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="preco">Preço</label>
                                                <input type="text" class="form-control" name="preco" id="preco"
                                                    placeholder="R$ 0,00" value="{{ $produto->preco }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="desconto">Desconto</label>
                                                <input type="text" class="form-control" name="desconto" id="desconto"
                                                    placeholder="%" value="{{ $produto->desconto }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="preco_com_desconto">Pr. com desconto</label>
                                                <input type="text" class="form-control" name="preco_com_desconto"
                                                    id="preco_com_desconto" value="{{ $produto->preco_com_desconto }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="qt">Quantidade</label>
                                                <input type="text" class="form-control" name="qt" id="qt"
                                                    value="{{ $produto->qt }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="empresa_id">Empresa</label>
                                                <select class="form-control" name="empresa_id" id="empresa_id">
                                                    <option>Selecione</option>
                                                    @foreach ($empresas as $e)
                                                        <option {{ $produto->empresa_id == $e->id ? 'selected' : '' }}
                                                            value="{{ $e->id }}">{{ $e->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="categoria_id">Categoria</label>
                                                <select class="form-control" name="categoria_id" id="categoria_id">
                                                    <option>Selecione</option>
                                                    @foreach ($categorias as $c)
                                                        <option {{ $produto->categoria_id == $c->id ? 'selected' : '' }}
                                                            value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="desconto">Imagem</label>
                                                <input type="file" class="form-control roudend" name="image"
                                                    id="image"><br />
                                                <img src="/storage/image/{{ $produto->image }}" width="150px" class="rounded">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="descricao">Descrição</label>
                                                <textarea class="form-control" name="descricao" id="descricao" cols="5" rows="5">{{ $produto->descricao }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                    <div class="row"><br/>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="composicao">Composição<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="composicao" id="composicao" cols="5">{{ $produto_detalhes->composicao }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="indicado">Para quem é indicado
                                                    ?<span class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="indicado" id="indicado" cols="5">{{ $produto_detalhes->indicado }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="funcionamento">Como funciona ?<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="funcionamento" id="funcionamento" cols="5">{{ $produto_detalhes->funcionamento }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="contraindicacoes">Contraindicacoes
                                                    ?<span class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="contraindicacoes" id="contraindicacoes" cols="5">{{ $produto_detalhes->contraindicacoes }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="como_usar">Como usar ?<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="como_usar" id="como_usar" cols="5">{{ $produto_detalhes->como_usar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="altura">Altura<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="altura"
                                                    id="altura" value="{{$produto_detalhes->altura}}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="largura">Largura<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="largura"
                                                    id="largura" value="{{$produto_detalhes->largura}}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="comprimento">Comprimento<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="comprimento"
                                                    id="comprimento" value="{{$produto_detalhes->comprimento}}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="peso">Peso<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="peso"
                                                    id="peso" value="{{$produto_detalhes->peso}}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="destaque">Destaque</label>
                                                <input type="checkbox" name="destaque" value="1" class="form-control"
                                                    @if (($produto_detalhes->destaque == 0 && old('destaque') && old('first_time')) ||
                                                        ($produto_detalhes->destaque && old('destaque') == null && old('first_time') == null) ||
                                                        ($produto_detalhes->destaque && old('destaque') && old('first_time'))) checked="checked" @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-check"></i>
                                    Atualizar</button>
                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm-delete"><i
                                        class="fa fa-trash"></i> Remover</a>
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ __('Confirmar exclusão') }}</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir esse registro ?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-link" type="button"
                                                    data-dismiss="modal">{{ __('Cancelar') }}</button>
                                                <a class="btn btn-danger btn-ok"
                                                    href="{{ route('produto.excluir', ['produto' => $produto->id]) }}">Visualizar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    // Iniciará quando todo o corpo do documento HTML estiver pronto.
    $().ready(function() {
        setTimeout(function() {
            $('#sucesso').hide(); // "sucesso" é o id do elemento que seja manipular.
        }, 2500); // O valor é representado em milisegundos.
    });

    // Iniciará quando todo o corpo do documento HTML estiver pronto.
    $().ready(function() {
        setTimeout(function() {
            $('#falha').hide(); // "falha" é o id do elemento que seja manipular.
        }, 2500); // O valor é representado em milisegundos.
    });
</script>
