<?php

namespace App\Http\Controllers\Sistema\Clientes;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Despesas;
use App\Models\Empresas;
use App\Models\Receitas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }
    public function index()
    {
        //contadores
        $empresas = Empresas::count();
        $clientes = Clientes::count();
        $despesas = Despesas::with('despesas')->get();
        $receitas = Receitas::with('receitas')->get();
        $widget = [
            'empresas' => $empresas,
            'clientes' => $clientes,
        ];
        return view('Sistema.Cliente.dashboard', compact('widget'),
        ['empresas' => $empresas,'clientes' => $clientes,
         'receitas' => $receitas,'despesas' => $despesas]);
    }
}
