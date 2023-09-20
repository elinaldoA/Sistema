<?php

namespace App\Http\Controllers\Sistema\Admin\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Planos;
use Illuminate\Http\Request;

class PlanosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planos = Planos::orderby('name','asc')->paginate(5);
        return view('Sistema.Admin.Cadastros.Planos.visualizar', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sistema.Admin.Cadastros.Planos.novo');
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

        Planos::create($request->all());
        return redirect()->route('planos')
        ->with('success','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Planos $plano)
    {
        return view('Sistema.Admin.Cadastros.Planos.show', compact('plano'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Planos $plano)
    {
        return view('Sistema.Admin.Cadastros.Planos.editar', compact('plano'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planos $plano)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $plano->update($request->all());
        return redirect()->route('planos')
        ->with('success','Atualiazado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Planos $plano)
    {
        $plano->delete();
        return redirect()->route('planos')
        ->with('success','Deletado com sucesso!');
    }
}
