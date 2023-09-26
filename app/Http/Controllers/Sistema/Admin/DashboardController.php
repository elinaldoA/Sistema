<?php

namespace App\Http\Controllers\Sistema\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Empresas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $empresas = Empresas::count();
        $clientes = Clientes::count();
        $widget = [
            'empresas' => $empresas,
            'clientes' => $clientes,
        ];
        return view('Sistema.Admin.dashboard', compact('widget'), ['empresas' => $empresas, 'clientes' => $clientes]);
    }
}
