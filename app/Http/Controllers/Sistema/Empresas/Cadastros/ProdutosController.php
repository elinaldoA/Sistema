<?php

namespace App\Http\Controllers\Sistema\Empresas\Cadastros;

use App\Exports\ProdutosExport;
use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Empresas;
use App\Models\Estoque;
use App\Models\Produtos;
use App\Models\ProdutosDetalhes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProdutosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:empresa');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::with('categorias')->get();
        $produtos = Produtos::orderby('nome','asc')->paginate(5);
        return view('Sistema.Empresa.Estoque.Produtos.visualizar', compact('produtos','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::with('categorias')->get();
        $empresas = Empresas::with('empresas')->get();
        return view('Sistema.Empresa.Estoque.Produtos.novo', compact('categorias','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'codigo' => 'required|string|max:10',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|string|max:255',
            'desconto' => 'string',
            'preco_com_desconto' => 'string',
            'qt' => 'required|integer',
            'empresa_id' => 'required|string',
            'categoria_id' => 'required|string',
            'active' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $produto = $request->all();

            if($image = $request->file('image'))
            {
                $destinationPath = 'storage/image/';
                $profileImage = date('YmdHis').".". $image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                $produto['image'] = "$profileImage";
            }
        Produtos::create($produto);
        ProdutosDetalhes::create($produto);
        Estoque::create($produto);
        return redirect()->route('produtos')
        ->with('success','Cadastrado com sucesso!');
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
        $empresas = Empresas::with('empresas')->get();
        return view('Sistema.Empresa.Estoque.Produtos.show', compact('produto','categorias','empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produto)
    {
        $categorias = Categorias::with('categorias')->get();
        $empresas = Empresas::with('empresas')->get();
        $produto_detalhes = ProdutosDetalhes::find($produto->id);
        return view('Sistema.Empresa.Estoque.Produtos.editar', compact('produto','categorias','empresas'), ['produto_detalhes' => $produto_detalhes]);
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
        $produto_detalhes = ProdutosDetalhes::find($produto->id);
        $estoque = Estoque::find($produto->id);
        $request->validate([
            'codigo' => 'required|string|max:10',
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
            'desconto' => 'string',
            'preco_com_desconto' => 'string',
            'qt' => 'required|integer',
            'empresa_id' => 'required|string',
            'categoria_id' => 'required|string',
            'active' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

        $input = $request->all();

        if($imagem = $request->file('image')){
            $destinationPath = 'storage/image/';
            $profileImage = date('YmdHis').".". $imagem->getClientOriginalExtension();
            $imagem->move($destinationPath,$profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $produto->update($input);
        $produto_detalhes->update($input);
        $estoque->update($input);
        return redirect()->route('produtos')
        ->with('success','Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Produtos $produto)
    {
       $produto->delete();
       return redirect()->route('produtos')->with('success', 'Deletado com sucesso!');
    }

    public function export()
    {
        return Excel::download(new ProdutosExport, 'produtos.xlsx');
    }
}
