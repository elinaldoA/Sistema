<?php

namespace App\Http\Controllers\Sistema\Admin\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Empresas;
use App\Models\Enderecos;
use App\Models\Generos;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::orderby('name','asc')->paginate(5);
        return view('Sistema.Admin.Cadastros.Clientes.visualizar', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Generos::with('generos')->get();
        $empresas = Empresas::with('empresas')->get();
        return view('Sistema.Admin.Cadastros.Clientes.novo', compact('generos','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Clientes();
        $cliente->active = $request->input('active');
        $cliente->name = $request->input('name');
        $cliente->cpf = $request->input('cpf');
        $cliente->email = $request->input('email');
        $cliente->genero_id = $request->input('genero_id');
        $cliente->empresa_id = $request->input('empresa_id');
        $cliente->save();
        $cliente = Clientes::all();
        /* Endereço empresa */
        $endereco = new Enderecos();
        $endereco->rua = $request->input('rua');
        $endereco->complemento = $request->input('complemento');
        $endereco->numero = $request->input('numero');
        $endereco->cep = $request->input('cep');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade = $request->input('cidade');
        $endereco->estado = $request->input('estado');
        $endereco->pais = $request->input('pais');
        $endereco->cliente_id = $request->input('cliente_id');
        $endereco->save();
        $endereco = Enderecos::all();
        return redirect()->route('clientes')->with('success', 'Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $cliente)
    {
        $generos = Generos::with('generos')->get();
        $empresas = Empresas::with('empresas')->get();
        $enderecos = Enderecos::with('enderecos')->get();
        return view('Sistema.Admin.Cadastros.Clientes.show', compact('cliente','enderecos','generos','empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $cliente)
    {
        $generos = Generos::with('generos')->get();
        $empresas = Empresas::with('empresas')->get();
        $enderecos = Enderecos::with('enderecos')->get();
        return view('Sistema.Admin.Cadastros.Clientes.editar', compact('cliente','enderecos','generos','empresas'));
    }
    public function update(Request $request, Clientes $cliente)
    {
        $request->validate([
            'active' => 'required|boolean',
            'name' => 'required|string|max:100',
            'cpf' => 'required|string',
            'email' => 'required|string|unique:users',
            'genero_id' => 'required|integer',
            'empresa_id' => 'required|integer',
            // Dados do endereço da empresa
            'rua' => 'required|string|min:10|max:100',
            'complemento' => 'string|max:50',
            'numero' => 'int',
            'cep' => 'string',
            'bairro' => 'string|min:1|max:100',
            'cidade' => 'string|min:1|max:50',
            'estado'=> 'string|min:2|max:2',
            'pais' => 'string|min:1|max:50',
        ]);
        $cliente->update($request->all());
        return redirect()->route('clientes')->with('success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes')->with('success','Excluído com sucesso');
    }
}
