<?php

namespace App\Http\Controllers\Sistema\Admin\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\Despesas;
use App\Models\Empresas;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despesas = Despesas::orderby('n_doc','asc')->paginate(5);
        $empresas = Empresas::with('empresas')->paginate(5);
        return view('Sistema.Admin.Financeiro.Despesas.visualizar',['despesas' => $despesas, 'empresas' => $empresas]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Despesas $despesa)
    {
        $empresas = Empresas::with('empresas')->get();
        return view('Sistema.Admin.Financeiro.Despesas.show', compact('despesa'), ['empresas' => $empresas]);
    }
}
