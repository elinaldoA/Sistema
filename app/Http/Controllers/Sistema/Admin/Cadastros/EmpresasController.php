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
        $empresas = new Empresas();
        $empresas->name = $request->input('name');
        $empresas->cnpj = $request->input('cnpj');
        $empresas->description = $request->input('description');
        $empresas->email = $request->input('email');
        $empresas->active = $request->input('active');
        $empresas->save();
        $empresas = Empresas::all();
        /* Endereço empresa */
        $enderecos = new Enderecos();
        $enderecos->rua = $request->input('rua');
        $enderecos->complemento = $request->input('complemento');
        $enderecos->numero = $request->input('numero');
        $enderecos->cep = $request->input('cep');
        $enderecos->bairro = $request->input('bairro');
        $enderecos->cidade = $request->input('cidade');
        $enderecos->estado = $request->input('estado');
        $enderecos->pais = $request->input('pais');
        $enderecos->empresa_id = $request->input('empresa_id');
        $enderecos->save();
        $enderecos = Enderecos::all();
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
        $enderecos = Enderecos::with('enderecos')->get();
        return view('Sistema.Admin.Cadastros.Empresas.show', compact('empresa','enderecos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresa)
    {
        $enderecos = Enderecos::with('enderecos')->get();
        return view('Sistema.Admin.Cadastros.Empresas.editar', compact('empresa','enderecos'));
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
