@extends('layouts.cliente')

@section('main-content')
    <section class="text-center">
        <div class="container">
            @forelse ($produtos as $p)
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  @if ($p->desconto == '')
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="https://i0.wp.com/gobanners.com.br/wp-content/uploads/2021/11/Banner-para-Black-Friday.jpg?resize=1000%2C480&ssl=1" alt="First slide">
                  </div>
                  @else
                  <div class="carousel-item active">
                    <img class="img-fluid" src="/storage/image/{{$p->image}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="/storage/image/{{$p->image}}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="img-fluid" src="/storage/image/{{$p->image}}" alt="Third slide">
                  </div>
                  @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        @empty
        @endforelse
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
                                <p class="card-text text-left">{{$p->descricao}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        @if($p->desconto == '')
                                        <p>R$ {{ number_format($p->preco, 2,",",".") }}</p>
                                        @else
                                        <p><s> R$ {{number_format($p->preco, 2,",",".")}}</s></p>
                                        <p> R$ {{number_format($p->preco_com_desconto, 2,",",".")}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Ver</button>
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
