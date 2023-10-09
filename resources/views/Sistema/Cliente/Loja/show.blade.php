@extends('layouts.cliente')

@section('main-content')
    <div class="card mb-3">
        @foreach ($produto as $p)
            <img src="/storage/image/{{ $p->image }}" class="card-img-top" alt="..." width="200px" height="600px">
            <div class="card-body">
                <p class="card-text"><small class="text-body-secondary">Código: {{$p->codigo}}</small></p>
                <h5 class="card-title">{{ $p->nome }}</h5>
                <p class="card-text">{{ $p->descricao }}</p>
                <p class="card-text"><small class="text-body-secondary">Disponível: {{$p->qt}}</small></p>
                @if($p->preco_com_desconto == '')
                <h5 class="card-text"><small class="text-body-secondary">Preço: R$ {{number_format($p->preco, 2, ",",".")}}</small></h5>
                @else
                <h5 class="card-text"><s><small class="text-body-secondary">Preço: R$ {{number_format($p->preco, 2, ",",".")}}</small></s>
                    | <small class="text-success">Oferta: R$ {{number_format($p->preco_com_desconto, 2, ",",".")}}</small></h5>
                @endif
            </div>
        @endforeach
    </div>
@endsection
