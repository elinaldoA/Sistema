<?php

namespace App\Http\Controllers\Sistema\Admin\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Empresas;
use App\Models\Enderecos;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresas::orderby('name','asc')->paginate(5);
        return view('Sistema.Admin.Cadastros.Empresas.visualizar', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sistema.Admin.Cadastros.Empresas.novo');
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
            'name' => 'required|string|max:50',
            'cnpj' => 'required|string|max:18',
            'description' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'active' => 'required|boolean',
            /* Dados do endereço da empresa */
            'rua' => 'required|string|min:10|max:100',
            'complemento' => 'required|string|max:50',
            'numero' => 'required|int',
            'cep' => 'required|string|min:10|max:15',
            'bairro' => 'required|string|min:1|max:100',
            'cidade' => 'required|string|min:1|max:50',
            'estado'=> 'required|string|min:2|max:2',
            'pais' => 'required|string|min:1|max:50',
        ]);

        Empresas::create($request->all());
        Enderecos::create($request->all());
        return redirect()->route('empresas')
        ->with('success','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresa)
    {
        return view('Sistema.Admin.Cadastros.Empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresa)
    {
        return view('Sistema.Admin.Cadastros.Empresas.editar', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresas $empresa)
    {
        $request->validate([
            'name' => 'required|string',
            'cnpj' => 'required|string',
            'description' => 'required|string',
            'email' => 'required|email|unique:users',
            'active' => 'required|boolean',
            /* Dados do endereço da empresa */
            'rua' => 'required|string|min:10|max:100',
            'complemento' => 'string|max:50',
            'numero' => 'int',
            'cep' => 'string|min:10|max:15',
            'bairro' => 'string|min:1|max:100',
            'cidade' => 'string|min:1|max:50',
            'estado'=> 'string|min:2|max:2',
            'pais' => 'string|min:1|max:50',
        ]);

        $empresa->update($request->all());
        return redirect()->route('empresas')
        ->with('success','Atualiazado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Empresas $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas')
        ->with('success','Deletado com sucesso!');
    }
}
