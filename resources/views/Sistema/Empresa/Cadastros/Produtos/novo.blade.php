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
                    <form method="POST" action="{{ route('produto.create') }}" class="produtos" enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-12">
                            <div class="row">
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="codigo">Ativo<span class="small text-danger"> * </span></label>
                                        <input type="checkbox" id="active" name="active" class="blue form-control" value="1"
                                        @if (old('active')) checked="checked" @endif required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="codigo">Código<span
                                                class="small text-danger">
                                                * </span></label>
                                        <input type="text" class="form-control" name="codigo" id="codigo" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
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
                                        <input type="text" class="form-control" name="desconto" id="desconto"
                                            placeholder="%" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="desconto">Pr. com Desconto<span
                                                class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="preco_com_desconto" id="preco_comn_desconto"
                                            placeholder="R$ 0,00" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="qt">Quantidade<span
                                                class="small text-danger"> * </span></label>
                                        <input type="text" class="form-control" name="qt" id="qt"
                                            />
                                    </div>
                                </div>
                                <div class="col-lg-4">
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
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descricao">Descrição<span
                                                class="small text-danger"> * </span></label>
                                        <textarea class="form-control" name="descricao" id="descricao" cols=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary"><i
                                        class="fas fa-plus"></i>
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
</script>
