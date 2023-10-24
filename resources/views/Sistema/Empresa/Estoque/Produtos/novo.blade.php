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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Novo</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('produto.create') }}" class="produtos"
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
                                                <label class="form-control-label" for="codigo">Ativo<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="checkbox" id="active" name="active"
                                                    class="blue form-control" value="1"
                                                    @if (old('active')) checked="checked" @endif required>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="codigo">Código<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="codigo" id="codigo" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="nome">Nome<span
                                                        class="small text-danger"> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="nome" id="nome" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="preco">Preço<span
                                                        class="small text-danger"> *
                                                    </span></label>
                                                <input type="text" class="form-control" name="preco" id="preco"
                                                    placeholder="R$ 0,00" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="desconto">Desconto<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="desconto"
                                                    id="desconto" placeholder="%" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="desconto">Pr. com Desconto<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="preco_com_desconto"
                                                    id="preco_comn_desconto" placeholder="R$ 0,00" />
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="qt">Quantidade<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="qt"
                                                    id="qt" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="empresa_id">Empresa<span
                                                        class="small text-danger"> * </span></label>
                                                <select class="form-control" name="empresa_id" id="empresa_id">
                                                    <option>Selecione</option>
                                                    @foreach ($empresas as $e)
                                                        <option value="{{ $e->id }}">{{ $e->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="categoria_id">Categoria<span
                                                        class="small text-danger"> * </span></label>
                                                <select class="form-control" name="categoria_id" id="categoria_id">
                                                    <option>Selecione</option>
                                                    @foreach ($categorias as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="file">Imagem<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input class="form-control" type="file" id="image"
                                                    name="image">
                                                <div class="galeria"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="descricao">Descrição<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="descricao" id="descricao" cols="5" rows="5"></textarea>
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
                                                <textarea class="form-control" name="composicao" id="composicao" cols="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="indicado">Para quem é indicado
                                                    ?<span class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="indicado" id="indicado" cols="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="funcionamento">Como funciona ?<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="funcionamento" id="funcionamento" cols="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="contraindicacoes">Contraindicacoes
                                                    ?<span class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="contraindicacoes" id="contraindicacoes" cols="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="como_usar">Como usar ?<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control" name="como_usar" id="como_usar" cols="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="altura">Altura<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="altura"
                                                    id="altura" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="largura">Largura<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="largura"
                                                    id="largura" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="comprimento">Comprimento<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="comprimento"
                                                    id="comprimento" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="peso">Peso<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="peso"
                                                    id="peso" />
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="destaque">Destaque<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="checkbox" id="destaque" name="destaque"
                                                    class="blue form-control" value="1"
                                                    @if (old('destaque')) checked="checked" @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus"></i>
                                        Criar</button>
                                    <a href="{{ route('produtos') }}" class="btn btn-outline-primary"><i
                                            class="fas fa-angle-double-left"></i> Voltar</a>
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
<script>
    $(function() {
        // Pré-visualização de várias imagens no navegador
        var visualizacaoImagens = function(input, lugarParaInserirVisualizacaoDeImagem) {

            if (input.files) {
                var quantImagens = input.files.length;

                for (i = 0; i < quantImagens; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img class="miniatura">')).attr('src', event.target.result)
                            .appendTo(lugarParaInserirVisualizacaoDeImagem);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#image').on('change', function() {
            visualizacaoImagens(this, 'div.galeria');
        });
    });
</script>
<style>
    .miniatura {
        height: 100px;
        border: 1px solid #f1f1f1;
        margin: 10px 5px 0 0;
    }
</style>
