@extends('layouts.empresa')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Clientes') }}</h1>

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
                    <form method="POST" action="{{ route('cliente.editar', ['cliente' => $cliente]) }}" class="empresas" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab_informacoes" role="tab">
                                    Informações
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab_endereco" role="tab">
                                    Endereço
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pl-lg-12">
                            <div class="tab-pane active" id="tab_informacoes" role="tabpanel"><br />
                                <div class="pl-lg-12">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="active">Status<span
                                                    class="small text-danger"> * </span></label>
                                                <input type="checkbox" name="active" value="1" class="form-control"
                                                    @if (($cliente->active == 0 && old('active') && old('first_time')) ||
                                                    ($cliente->active && old('active') == null && old('first_time') == null) ||
                                                    ($cliente->active && old('active') && old('first_time'))) checked="checked" @endif>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="name">Nome<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ $cliente->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="cpf">Cpf<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="text" class="form-control" name="cpf" id="cpf"
                                                    value="{{ $cliente->cpf }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="email">E-mail<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    value="{{ $cliente->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="genero_id">Sexo<span
                                                        class="small text-danger"> * </span></label>
                                                <select class="form-control" name="genero_id" id="genero_id">
                                                    <option>Selecione</option>
                                                    @foreach ($generos as $g)
                                                        <option {{ $cliente->genero_id == $g->id ? 'selected' : '' }}
                                                            value="{{ $g->id }}">{{ $g->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="empresa_id">Empresa<span
                                                        class="small text-danger"> * </span></label>
                                                <select class="form-control" name="empresa_id" id="empresa_id">
                                                    <option>Selecione</option>
                                                    @foreach ($empresas as $e)
                                                        <option {{ $cliente->empresa_id == $e->id ? 'selected' : '' }}
                                                            value="{{ $e->id }}">{{ $e->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="desconto">Imagem<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="file" class="form-control roudend" name="image" id="image"><br/>
                                                <img src="/storage/image/{{ $cliente->image }}" width="150px" class="rounded">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_endereco" role="tabpanel"><br />
                                @foreach ($enderecos as $e)
                                    @if ($cliente->id == $e->cliente_id)
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="rua">Rua<span
                                                            class="small text-danger"> * </span></label>
                                                    <input type="text" id="rua" class="form-control"
                                                        name="rua"
                                                        placeholder="Rua, Logradouro, Avenida, Travessa ..."
                                                        value="{{ $e->rua }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="referencia">Ponto de
                                                        referência<span class="small text-danger">*</span></label>
                                                    <input type="text" id="complemento" class="form-control"
                                                        name="complemento" placeholder="Perto de..."
                                                        value="{{ $e->complemento }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="numero">Número<span
                                                            class="small text-danger"> * </span></label>
                                                    <input type="text" id="numero" class="form-control"
                                                        name="numero" placeholder="1234" onkeyup="somenteNumeros(this);"
                                                        maxlength="4" value="{{ $e->numero }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="bairro">Bairro<span
                                                            class="small text-danger"> * </span></label>
                                                    <input type="text" id="bairro" name="bairro"
                                                        class="form-control" placeholder="Bairro"
                                                        value="{{ $e->bairro }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="cep">Cep<span
                                                            class="small text-danger"> * </span></label>
                                                    <input type="text" id="cep" class="form-control"
                                                        name="cep" placeholder="Números"
                                                        onkeypress="mascara(this,'#####-###')" maxlength="12"
                                                        value="{{ $e->cep }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="cidade">Cidade<span
                                                            class="small text-danger">*</span></label>
                                                    <input type="text" id="cidade" class="form-control"
                                                        name="cidade" placeholder="Sua cidade"
                                                        value="{{ $e->cidade }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="estado">Estado<span
                                                            class="small text-danger"> * </span></label>
                                                    <input type="text" id="estado" class="form-control"
                                                        name="estado" placeholder="Es" maxlength="2"
                                                        value="{{ $e->estado }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="pais">País<span
                                                            class="small text-danger"> * </span></label>
                                                    <input type="text" id="pais" class="form-control"
                                                        name="pais" placeholder="Brasil" value="{{ $e->pais }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-check"></i>
                                    Atualizar</button>
                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i> Remover</a>
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirmar exclusão') }}</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir esse registro ?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                                                <a class="btn btn-danger btn-ok" href="{{route('cliente.excluir', ['cliente' => $cliente->id])}}">Confirmar</a>
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
</script>
