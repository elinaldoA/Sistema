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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Novo</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('empresa.create') }}" class="empresas"
                        enctype="multipart/form-data">
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
                                                <input type="checkbox" id="active" name="active"
                                                    class="blue form-control" value="1"
                                                    @if (old('active')) checked="checked" @endif required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="name">Nome<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="cpf">Cnpj<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="text" class="form-control" name="cnpj" id="cnpj"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="email">E-mail<span
                                                        class="small text-danger"> * </span></label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="modulo_id">Módulo<span
                                                        class="small text-danger"> * </span></label>
                                                <select class="form-control" name="modulo_id" id="modulo_id">
                                                    <option>Selecione</option>
                                                    @foreach ($modulos as $m)
                                                        <option value="{{ $m->id }}">{{ $m->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="image">Imagem<span
                                                        class="small text-danger"> * </span></label>
                                                <input class="form-control" type="file" id="image"
                                                    name="image">
                                                <div class="galeria"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="description">Descrição<span
                                                        class="small text-danger"> * </span></label>
                                                <textarea class="form-control form-control-user" name="description" id="description" required cols="5"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_endereco" role="tabpanel"><br />
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="rua">Rua<span
                                                    class="small text-danger"> * </span></label>
                                            <input type="text" id="rua" class="form-control" name="rua"
                                                placeholder="Rua, Logradouro, Avenida, Travessa ..." required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="referencia">Ponto de referência<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="complemento" class="form-control"
                                                name="complemento" placeholder="Perto de..." required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="numero">Número<span
                                                    class="small text-danger"> * </span></label>
                                            <input type="text" id="numero" class="form-control" name="numero"
                                                placeholder="1234" onkeyup="somenteNumeros(this);" required
                                                maxlength="4">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="bairro">Bairro<span
                                                    class="small text-danger"> * </span></label>
                                            <input type="text" id="bairro" name="bairro" class="form-control"
                                                placeholder="Bairro" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="cep">Cep<span
                                                    class="small text-danger"> * </span></label>
                                            <input type="text" id="cep" class="form-control" name="cep"
                                                placeholder="Números" onkeypress="mascara(this,'#####-###')"
                                                maxlength="12" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="cidade">Cidade<span
                                                    class="small text-danger">*</span></label>
                                            <input type="text" id="cidade" class="form-control" name="cidade"
                                                placeholder="Sua cidade" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="estado">Estado<span
                                                    class="small text-danger"> * </span></label>
                                            <input type="text" id="estado" class="form-control" name="estado"
                                                placeholder="Es" maxlength="2" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="pais">País<span
                                                    class="small text-danger"> * </span></label>
                                            <input type="text" id="pais" class="form-control" name="pais"
                                                placeholder="Brasil" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" hidden="true">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="empresa_id">Empresa<span
                                                    class="small text-danger"> * </span></label>
                                            <input type="text" id="empresa_id" class="form-control" name="empresa_id"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus"></i>
                                    Criar</button>
                                <a href="{{ route('empresas') }}" class="btn btn-outline-primary"><i
                                        class="fas fa-angle-double-left"></i> Voltar</a>
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
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>
