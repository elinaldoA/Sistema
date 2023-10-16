@extends('layouts.empresa')

@section('main-content')
    @if (session('success'))
        <div id="boas_vindas" class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <!-- Receitas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <a href="#">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Receitas</div>
                            @php
                            $Valortotal = 0;
                            foreach($receitas as $r){
                            $Valortotal += $r->valor;
                            }
                            @endphp
                            <!--Exibe valores pagos geral-->
                            @php
                            $Despesatotal = 0;
                            foreach($despesas as $d){
                            $Despesatotal += $d->valor;
                            }
                            @endphp
                            <div class="h5 mb-0 font-weight-bold text-gray-800">R$ 0,00</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-level-up-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Despesas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <a href="#">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Despesas</div>
                            <!--Exibe valores pagos geral-->
                            @php
                            $Despesatotal = 0;
                            foreach($despesas as $d){
                            $Despesatotal += $d->valor;
                            }
                            @endphp
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ 'R$ ' . number_format(- $Despesatotal, 2, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-level-down-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- Empresas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Produtos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['produtos'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Clientes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Clientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['clientes'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Vendas</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                    Controle de caixa
                </div>
            </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Despesas</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                    Movimentações
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
            $('#boas_vindas').hide(); // "boas_vindas" é o id do elemento que seja manipular.
        }, 2500); // O valor é representado em milisegundos.
    });
</script>
