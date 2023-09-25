<?php

namespace App\Http\Controllers\Sistema\Admin\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Empresas;
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
        $request->validate([
            'active' => 'required|boolean',
            'name' => 'required|string|max:100',
            'cpf' => 'required|string',
            'email' => 'required|string|unique:users',
            'genero_id' => 'required|integer',
            'empresa_id' => 'required|integer',
        ]);
        Clientes::create($request->all());
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
        return view('Sistema.Admin.Cadastros.Clientes.show', compact('cliente', 'generos','empresas'));
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
        return view('Sistema.Admin.Cadastros.Clientes.editar', compact('cliente', 'generos','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $cliente)
    {
        $request->validate([
            'active' => 'required|boolean',
            'name' => 'required|string|max:100',
            'cpf' => 'required|string',
            'email' => 'required|string|unique:users',
            'genero_id' => 'required|integer',
            'empresa_id' => 'required|integer',
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
