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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Editar</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('produto.editar', ['produto' => $produto]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="codigo">Ativo<span
                                            class="small text-danger"> *
                                        </span></label>
                                        <input type="checkbox" name="active" value="1" class="form-control"
                                        @if( ($produto->active == 0 && old('active') && old('first_time'))
                                        || ($produto->active && old('active') == null && old('first_time') == null)
                                        || ($produto->active && old('active') && old('first_time') ) )
                                            checked="checked"
                                        @endif
                                         >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="codigo">Código<span
                                            class="small text-danger">
                                            * </span></label>
                                    <input type="text" class="form-control" name="codigo" id="codigo" value="{{$produto->codigo}}"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="nome">Nome<span
                                            class="small text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="{{$produto->nome}}"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="preco">Preço<span
                                            class="small text-danger"> *
                                        </span></label>
                                    <input type="text" class="form-control" name="preco" id="preco"
                                        placeholder="R$ 0,00" value="{{$produto->preco}}"/>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="desconto">Desconto<span
                                            class="small text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="desconto" id="desconto"
                                        placeholder="%" value="{{$produto->desconto}}%"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="categoria_id">Categoria<span
                                            class="small text-danger"> * </span></label>
                                    <select class="form-control" name="categoria_id" id="categoria_id">
                                        <option>Selecione</option>
                                        @foreach ($categorias as $c)
                                            <option {{ $produto->categoria_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="desconto">Imagem<span
                                            class="small text-danger">
                                            * </span></label>
                                    <input type="file" class="form-control roudend" name="imagem" id="imagem"><br/>
                                    <img src="/storage/image/{{ $produto->image }}" width="150px" class="rounded">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="descricao">Descrição<span
                                            class="small text-danger"> * </span></label>
                                    <textarea class="form-control" name="descricao" id="descricao" cols="5" rows="5">{{$produto->descricao}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-check"></i> Atualizar</button>
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
