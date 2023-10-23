@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Despesas') }}</h1>

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
                    <a class="btn btn-outline-success text-right" href="#"><i class="fas fa-file-csv"></i>
                        Exportar</a>
                    <div class="card-body">

                        <table class="table table-hover text-center">
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">N° doc.</th>
                                <th scope="col">Fornecedor</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Data do pagamento</th>
                                <th scope="col">Valor do pagamento</th>
                                <th scope="col">Obs.</th>
                                <th scope="col">Ações</th>
                            </tr>
                            @forelse($despesas as $d)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($d->data)) }}</td>
                                    <td>{{ $d->n_doc }}</td>
                                    @foreach ($empresas as $e)
                                        @if ($d->empresa_id == $e->id)
                                            <td>{{ $e->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ 'R$ ' . number_format($d->valor, 2, ',', '.') }}</td>
                                    <td>{{ date('d-m-Y', strtotime($d->dt_pagamento)) }}</td>
                                    <td>{{ 'R$ ' . number_format($d->vl_pago, 2, ',', '.') }}</td>
                                    <td>{{ $d->obs }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('despesa.show', ['despesa' => $d->id]) }}"><i
                                                class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <h4>Nenhum registro encontrado para listar</h4>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <nav aria-label="Navegação de página exemplo">
                            <ul class="pagination justify-content-center">
                                {!! $despesas->links() !!}
                            </ul>
                        </nav>
                    </div>
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
