<?php

namespace App\Http\Controllers\Sistema\Admin\Cadastros;

use App\Http\Controllers\Controller;
use App\Models\Empresas;
use App\Models\EnderecoEmpresas;
use App\Models\Modulos;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresas::orderby('name','asc')->paginate(5);
        $modulos = Modulos::with('modulos')->get();
        return view('Sistema.Admin.Cadastros.Empresas.visualizar', compact('empresas','modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = Modulos::with('modulos')->get();
        return view('Sistema.Admin.Cadastros.Empresas.novo', compact('modulos'));
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
            'name' => 'required|string',
            'cnpj' => 'required|string',
            'description' => 'string',
            'email' => 'required|email|unique:users',
            // Dados do endereço da empresa
            'rua' => 'required|string|min:10|max:100',
            'complemento' => 'string|max:50',
            'numero' => 'int',
            'cep' => 'string',
            'bairro' => 'string',
            'cidade' => 'string',
            'estado'=> 'string|min:2|max:2',
            'pais' => 'string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();

            if($image = $request->file('image'))
            {
                $destinationPath = 'storage/image/';
                $profileImage = date('YmdHis').".". $image->getClientOriginalExtension();
                $image->move($destinationPath,$profileImage);
                $input['image'] = "$profileImage";
            }
        Empresas::create($input);
        EnderecoEmpresas::create($input);
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
        $enderecos = EnderecoEmpresas::find($empresa->id);
        $modulos = Modulos::with('modulos')->get();
        return view('Sistema.Admin.Cadastros.Empresas.show', compact('empresa','enderecos','modulos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresa)
    {
        $enderecos = EnderecoEmpresas::find($empresa->id);
        $modulos = Modulos::with('modulos')->get();
        return view('Sistema.Admin.Cadastros.Empresas.editar', ['empresa' => $empresa,'enderecos' => $enderecos, 'modulos' => $modulos]);
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
        $endereco = EnderecoEmpresas::find($empresa->id);
        $request->validate([
            'active' => 'required|boolean',
            'name' => 'required|string',
            'cnpj' => 'required|string',
            'description' => 'string',
            'email' => 'required|email',
            // Dados do endereço da empresa
            'rua' => 'required|string|min:10|max:100',
            'complemento' => 'string|max:50',
            'numero' => 'int',
            'cep' => 'string',
            'bairro' => 'string',
            'cidade' => 'string',
            'estado'=> 'string|min:2|max:2',
            'pais' => 'string',
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

        $empresa->update($input);
        $endereco->update($input);
        return redirect()->route('empresas')
        ->with('success','Atualizado com sucesso!');
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
