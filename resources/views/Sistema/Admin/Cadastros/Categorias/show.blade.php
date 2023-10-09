@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Detalhes') }}</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-eye"></i> Categorias</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categoria.show', ['categoria' => $categoria->id]) }}"
                        enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pl-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="nome">Nome<span
                                                class="small text-danger"> * </span></label>
                                        <input class="form-control" name="nome" id="nome"
                                            value="{{ $categoria->name }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="data">Criado<span
                                                class="small text-danger"> * </span></label>
                                        <input class="form-control" name="data" id="data"
                                            value="{{ date('d-m-Y', strtotime($categoria->created_at)) }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('categorias') }}" class="btn btn-outline-primary"><i
                                        class="fas fa-angle-double-left"></i></a>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
