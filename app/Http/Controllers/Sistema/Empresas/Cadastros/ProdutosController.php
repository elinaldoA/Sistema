<?php

namespace App\Http\Controllers\Sistema\Empresas\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Models\Produtos;
use Illuminate\Http\Request;

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
        return view('Sistema.Empresa.Cadastros.Produtos.visualizar', compact('produtos','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::with('categorias')->get();
        return view('Sistema.Empresa.Cadastros.Produtos.novo', compact('categorias'));
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
            'descricao' => 'required|string|max:255',
            'preco' => 'required|string|max:255',
            'desconto' => 'string',
            'preco_com_desconto' => 'string',
            'qt' => 'required|integer',
            'categoria_id' => 'required|string',
            'active' => 'required|boolean',
            'image' => 'required',
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
        return view('Sistema.Empresa.Cadastros.Produtos.show', compact('produto', 'categorias'));
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
        return view('Sistema.Empresa.Cadastros.Produtos.editar', compact('produto','categorias'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produto)
    {
        //
    }
}
