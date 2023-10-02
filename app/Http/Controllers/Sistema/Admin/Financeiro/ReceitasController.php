<?php

namespace App\Http\Controllers\Sistema\Admin\Financeiro;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Receitas;
use Illuminate\Http\Request;

class ReceitasController extends Controller
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
        $receitas = Receitas::orderby('n_doc','asc')->paginate(5);
        $clientes = Clientes::with('clientes')->get();
        return view('Sistema.Admin.Financeiro.Receitas.visualizar',['receitas' => $receitas, 'clientes' => $clientes]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Receitas $receita)
    {
        $clientes = Clientes::with('clientes')->get();
        return view('Sistema.Admin.Financeiro.Receitas.show', compact('receita'), ['clientes' => $clientes]);
    }
}
