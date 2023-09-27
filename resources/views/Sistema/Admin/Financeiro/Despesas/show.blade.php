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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-eye"></i> Despesas</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('despesa.show', ['despesa' => $despesa->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="data">Data<span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="data" id="data" value="{{date('d-m-Y', strtotime($despesa->data))}}" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="n_doc">N° doc.</label><span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="n_doc" id="n_doc" value="{{$despesa->n_doc}}" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="fornecedor">Fornecedor</label><span class="small text-danger"> * </span></label>
                                    @foreach ($empresas as $e)
                                        @if ($despesa->empresa_id == $e->id)
                                            <input class="form-control" name="fornecedor" id="fornecedor" value="{{$e->name}}" />
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="valor">Valor</label><span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="valor" id="valor" value="{{'R$' .number_format( $despesa->valor, 2, '','.')}}" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="dt_pagamento">Dt do pagamento<span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="dt_pagamento" id="dt_pagamento" value="{{date('d-m-Y', strtotime($despesa->dt_pagamento))}}" />
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="vl_pago">Valor</label><span class="small text-danger"> * </span></label>
                                    <input class="form-control" name="vl_pago" id="vl_pago" value="{{'R$' .number_format( $despesa->vl_pago, 2, '','.')}}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="obs">Obeservações</label><span class="small text-danger"> * </span></label>
                                    <textarea class="form-control" name="obs" id="obs" rows="4">{{$despesa->obs}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="row">
                        <div class="col">
                            <a href="{{route('despesas')}}" class="btn btn-outline-primary"><i class="fas fa-angle-double-left"></i></a>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection
