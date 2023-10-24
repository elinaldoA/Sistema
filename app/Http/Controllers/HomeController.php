<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Produtos;
use App\Models\ProdutosDetalhes;

class HomeController extends Controller
{
    public function index()
    {
        $produtos = Produtos::orderby('nome','asc')->paginate(12);
        return view('home', compact('produtos'));
    }
    public function show(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        $produto_detalhes = ProdutosDetalhes::find($produto->id);
        return view('show', compact('produto'), ['categorias' => $categorias, 'produto_detalhes' => $produto_detalhes]);
    }
    public function cart()
    {
        $produtos = Produtos::with('produtos')->get();
        $categorias = Categorias::with('categorias')->get();
        return view('cart', compact('produtos'), ['categorias' => $categorias]);
    }
    public function checkout(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('checkout', compact('produto'), ['categorias' => $categorias]);
    }
    public function revisar(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('revisar', compact('produto'), ['categorias' => $categorias]);
    }
    public function update(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('item', compact('produto'), ['categorias' => $categorias]);
    }
    public function remove(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        return view('cart', compact('produto'), ['categorias' => $categorias]);
    }
}
