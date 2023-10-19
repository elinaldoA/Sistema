<?php

namespace App\Http\Controllers\Sistema\Clientes\Loja;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Produtos;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::orderby('nome','asc')->paginate(12);
        return view('Sistema.Cliente.Loja.visualizar', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('Sistema.Cliente.Loja.item', compact('produto'), ['categorias' => $categorias]);
    }
    public function cart()
    {
        $produtos = Produtos::with('produtos')->get();
        $categorias = Categorias::with('categorias')->get();
        return view('Sistema.Cliente.Loja.cart', compact('produtos'), ['categorias' => $categorias]);
    }
    public function checkout(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('Sistema.Cliente.Loja.checkout', compact('produto'), ['categorias' => $categorias]);
    }
    public function revisar(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('Sistema.Cliente.Loja.revisar', compact('produto'), ['categorias' => $categorias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('Sistema.Cliente.Loja.show', compact('produto'), ['categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('Sistema.Cliente.Loja.item', compact('produto'), ['categorias' => $categorias]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Produtos $produto)
    {

    }
}
