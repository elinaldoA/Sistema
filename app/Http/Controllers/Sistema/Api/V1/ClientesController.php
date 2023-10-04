<?php

namespace App\Http\Controllers\Sistema\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource;
use App\Models\Clientes;
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
        return ClienteResource::collection(Clientes::with('clientes')->paginate(15));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Clientes::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'genero_id' => $request->genero_id,
            'email' => $request->email,
            'active' => $request->active,
            'empresa_id' => $request->empresa_id,
        ]);

        return new ClienteResource($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $cliente)
    {
        return new ClienteResource($cliente);
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
        $cliente->update($request->only(['name','cpf','genero_id','email','active','empresa_id']));
        return new ClienteResource($cliente);
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
        return response(null, 204);
    }
}
