<?php

namespace App\Http\Controllers\Sistema\Admin\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::orderby('name','asc')->paginate(5);
        return view('Sistema.Admin.Cadastros.Categorias.visualizar', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sistema.Admin.Cadastros.Categorias.novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Categorias::create($request->all());
        return redirect()->route('categorias')
        ->with('success','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categoria)
    {
        return view('Sistema.Admin.Cadastros.Categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categoria)
    {
        return view('Sistema.Admin.Cadastros.Categorias.editar', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias')
        ->with('success','Atualiazado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Categorias $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias')
        ->with('success','Deletado com sucesso!');
    }
}
