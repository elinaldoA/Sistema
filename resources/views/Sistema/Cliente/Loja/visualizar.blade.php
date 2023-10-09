@extends('layouts.cliente')

@section('main-content')
    <section class="text-center">
        <div class="container">
        <div class="album py-5">
            <div class="container">
                <div class="row">
                    @forelse ($produtos as $p)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top"
                                src="/storage/image/{{$p->image}}"
                                alt="Card image cap" width="250px" height="250px">
                            <div class="card-body">
                                <span class="card-text">{{$p->nome}}</span>
                                <p class="card-text text-left">{{substr($p->descricao, 0, 150)}} ...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        @if($p->desconto == '')
                                        <p>R$ {{ number_format($p->preco, 2,",",".") }}</p>
                                        @else
                                        <h5 class="card-text"><s><small class="text-body-secondary">Preço: R$ {{number_format($p->preco, 2, ",",".")}}</small></s>
                                            | <small class="text-success">Oferta: R$ {{number_format($p->preco_com_desconto, 2, ",",".")}}</small></h5>
                                        @endif
                                    </div>
                                </div><br/>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-outline-secondary">Saiba mais</a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                                    </div>
                                    <small class="text-muted">Disponivel: {{$p->qt}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4>Nenhum registro encontrado para listar</h4>
                            </div>
                        </div>
                    @endforelse
                </div>
                <nav aria-label="Navegação de página exemplo">
                    <ul class="pagination justify-content-center">
                        {!! $produtos->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </section>
@endsection
