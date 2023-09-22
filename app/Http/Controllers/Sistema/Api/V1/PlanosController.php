<?php

namespace App\Http\Controllers\Sistema\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanoResource;
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
        return PlanoResource::collection(Planos::with('planos')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plano = Planos::create([
            'name' => $request->name,
        ]);

        return new PlanoResource($plano);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Planos $plano)
    {
        return new PlanoResource($plano);
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
        $plano->update($request->only(['name']));
        return new PlanoResource($plano);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planos $plano)
    {
        $plano->delete();
        return response()->json(null, 204);
    }
}
