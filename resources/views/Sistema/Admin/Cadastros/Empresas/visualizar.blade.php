@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Empresas') }}</h1>

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
                <a class="btn btn-outline-success pull-left" href="novo"><i class="fas fa-plus"></i> Adicionar</a>
                <a class="btn btn-outline-success text-right" href="#"><i class="fas fa-file-csv"></i> Exportar</a>
                <div class="card-body">

                    <table class="table table-hover text-center">
                        <tr>
                            <th scope="col">image</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Segmento</th>
                            <th scope="col">Ações</th>
                        </tr>
                        @forelse($empresas as $e)
                        <tr>
                            <td><img src="/storage/image/{{$e->image}}" height="50px" width="50px"></td>
                            <td>{{$e->name}}</td>
                            @foreach ($modulos as $m)
                                @if ($e->modulo_id == $m->id)
                                    <td>{{$m->name}}</td>
                                @endif
                            @endforeach
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('empresa.editar', ['empresa' => $e->id])}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-outline-primary" href="{{route('empresa.show', ['empresa' => $e->id])}}"><i class="fa fa-eye"></i></a>
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
                            {!! $empresas->links() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
