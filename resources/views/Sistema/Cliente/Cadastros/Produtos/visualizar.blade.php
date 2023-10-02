@extends('layouts.cliente')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Produtos') }}</h1>

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
                <a class="btn btn-outline-success pull-left" href="novo"><i class="fas fa-plus"></i> Adicionar</a>
                <a class="btn btn-outline-success text-right" href="#"><i class="fas fa-file-csv"></i> Exportar</a>
                <div class="card-body">

                    <table class="table table-hover text-center">
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ações</th>
                        </tr>
                        @forelse($produtos as $p)
                        <tr>
                            <td><img src="/storage/image/{{ $p->image }}" width="50px" class="rounded"></td>
                            <td>{{$p->codigo}}</td>
                            <td>{{$p->nome}}</td>
                            @foreach ($categorias as $c)
                                @if ($p->categoria_id == $c->id)
                                    <td>{{$c->name}}</td>
                                @endif()
                            @endforeach
                            <td>
                                <a class="btn btn-outline-primary" href="{{route('produto.editar', ['produto' => $p->id])}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-outline-primary" href="{{route('produto.show', ['produto' => $p->id])}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Confirmar exclusão') }}</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir esse registro ?
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                                                <a class="btn btn-danger btn-ok" href="{{route('produto.excluir', ['produto' => $p->id])}}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            {!! $produtos->links() !!}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
