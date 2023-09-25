@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Detalhes') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-eye"></i> clientes</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cliente.show', ['cliente' => $cliente->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-12">
                            <div class="row">
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
                                        <label class="form-control-label" for="cpf">Cpf<span class="small text-danger">
                                                * </span></label>
                                        <input type="text" class="form-control" name="cpf" id="cpf"
                                            value="{{ $cliente->cpf }}" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
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
                                <div class="col-lg-1">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="active">Status<span
                                                class="small text-danger"> * </span></label>
                                        <input type="checkbox" name="active" value="1" class="form-control"
                                            @if (
                                            ($cliente->active == 0 && old('active') && old('first_time')) ||
                                            ($cliente->active && old('active') == null && old('first_time') == null) ||
                                            ($cliente->active && old('active') && old('first_time'))) checked="checked" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('clientes') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-angle-double-left"></i></a>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
