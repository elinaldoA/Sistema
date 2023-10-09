@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Empresas') }}</h1>

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
                    <form method="POST" action="{{ route('empresa.editar', ['empresa' => $empresa]) }}" class="empresas"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                                <input type="checkbox" name="active" id="active"
                                                    value="{{ $empresa->active }}" class="blue form-control"
                                                    @if (
                                                        ($empresa->active == 0 && old('active') && old('first_time')) ||
                                                            ($empresa->active && old('active') == null && old('first_time') == null) ||
                                                            ($empresa->active && old('active') && old('first_time'))) checked="checked" @endif>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="name">Nome<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ $empresa->name }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="cpf">Cnpj<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="cnpj" id="cnpj"
                                                    value="{{ $empresa->cnpj }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="email">E-mail<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    value="{{ $empresa->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="empresa_id">Módulo<span
                                                        class="small text-danger"> * </span></label>
                                                <select class="form-control" name="modulo_id" id="modulo_id">
                                                    <option>Selecione</option>
                                                    @foreach ($modulos as $m)
                                                        <option {{ $empresa->modulo_id == $m->id ? 'selected' : '' }}
                                                            value="{{ $m->id }}">{{ $m->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="desconto">Imagem<span
                                                        class="small text-danger">
                                                        * </span></label>
                                                <input type="file" class="form-control roudend" name="image"
                                                    id="image"><br />
                                                <img src="/storage/image/{{ $empresa->image }}" width="150px"
                                                    class="rounded">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="description">Descrição<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control form-control-user" name="description" id="description" required cols="5"
                                                    rows="5">{{ $empresa->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_endereco" role="tabpanel"><br />
                                @foreach ($enderecos as $e)
                                    @if ($empresa->id == $e->empresa_id)
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
