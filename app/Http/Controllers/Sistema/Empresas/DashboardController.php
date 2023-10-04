<?php

namespace App\Http\Controllers\Sistema\Empresas;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Despesas;
use App\Models\Produtos;
use App\Models\Receitas;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:empresa');
    }
    public function index()
    {
        //contadores
        $produtos = Produtos::count();
        $clientes = Clientes::count();
        $despesas = Despesas::with('despesas')->get();
        $receitas = Receitas::with('receitas')->get();
        $widget = [
            'produtos' => $produtos,
            'clientes' => $clientes,
        ];
        return view('sistema.empresa.dashboard', compact('widget'),
        ['produtos' => $produtos,'clientes' => $clientes,
         'receitas' => $receitas,'despesas' => $despesas]);
    }
}
