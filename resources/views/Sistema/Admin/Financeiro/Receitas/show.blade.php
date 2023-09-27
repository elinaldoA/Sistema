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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-eye"></i> Receitas</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('receita.show', ['receita' => $receita->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="data">Data<span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="data" id="data" value="{{date('d-m-Y', strtotime($receita->data))}}" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="n_doc">N° doc.</label><span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="n_doc" id="n_doc" value="{{$receita->n_doc}}" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="cliente_id">Cliente</label><span class="small text-danger"> * </span></label>
                                    @foreach ($clientes as $c)
                                        @if ($receita->cliente_id == $c->id)
                                            <input class="form-control" name="cliente_id" id="cliente_id" value="{{$c->name}}" />
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="valor">Valor</label><span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="valor" id="valor" value="{{'R$' .number_format( $receita->valor, 2, '','.')}}" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="dt_pagamento">Dt do recebimento<span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="dt_recebido" id="dt_recebido" value="{{date('d-m-Y', strtotime($receita->dt_recebido))}}" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="vl_recebido">Valor</label><span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="vl_recebido" id="vl_recebido" value="{{'R$' .number_format( $receita->vl_recebido, 2, '','.')}}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="obs">Obeservações</label><span class="small text-danger"> * </span></label>
                                    <textarea class="form-control" name="obs" id="obs" rows="4">{{$receita->obs}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="row">
                        <div class="col">
                            <a href="{{route('receitas')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i></a>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection
