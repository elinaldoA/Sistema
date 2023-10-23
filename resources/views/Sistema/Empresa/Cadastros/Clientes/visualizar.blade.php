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

    <div class="col">
        <div class="col-lg-12 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-outline-success pull-left" href="novo"><i class="fas fa-plus"></i> Adicionar</a>
                    <a class="btn btn-outline-success pull-left" href="{{ route('export-cliente') }}"><i
                            class="fas fa-file-csv"></i> Exportar</a>
                    <div class="card-body">

                        <table class="table table-hover text-center">
                            <tr>
                                <th scope="col">Foto</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ativo</th>
                                <th scope="col">Ações</th>
                            </tr>
                            @forelse($clientes as $c)
                                <tr>
                                    <td><img src="/storage/image/{{ $c->image }}" width="50px" class="rounded"></td>
                                    <td>{{ $c->name }}</td>
                                    <td><input type="checkbox" name="active" value="1" class="form-control"
                                            @if (
                                                ($c->active == 0 && old('active') && old('first_time')) ||
                                                    ($c->active && old('active') == null && old('first_time') == null) ||
                                                    ($c->active && old('active') && old('first_time'))) checked="checked" @endif></td>
                                    <td>
                                        <a class="btn btn-outline-primary"
                                            href="{{ route('cliente.editar', ['id' => $c->id]) }}"><i
                                                class="fa fa-edit"></i></a>
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
                                {!! $clientes->links() !!}
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

    // Iniciará quando todo o corpo do documento HTML estiver pronto.
    $().ready(function() {
        setTimeout(function() {
            $('#falha').hide(); // "falha" é o id do elemento que seja manipular.
        }, 2500); // O valor é representado em milisegundos.
    });
</script>
