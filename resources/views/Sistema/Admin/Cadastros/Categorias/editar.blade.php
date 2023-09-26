@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Categorias') }}</h1>

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
                <form method="POST" action="{{ route('categoria.editar', ['categoria' => $categoria]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Nome<span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="name" id="name" value="{{$categoria->name}}" />
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
