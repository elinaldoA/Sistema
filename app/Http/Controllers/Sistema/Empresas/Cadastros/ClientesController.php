<?php

namespace App\Http\Controllers\Sistema\Empresas\Cadastros;

use App\Exports\ClientesExport;
use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Empresas;
use App\Models\EnderecoClientes;
use App\Models\Generos;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientesController extends Controller
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
        $clientes = Clientes::orderby('name','asc')->paginate(5);
        return view('Sistema.Empresa.Cadastros.Clientes.visualizar', compact('clientes'));
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
        return view('Sistema.Empresa.Cadastros.Clientes.novo', compact('generos','empresas'));
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
            'cpf' => 'required|string',
            'email' => 'required|email|unique:users',
            'genero_id' => 'required|string',
            'empresa_id' => 'required|string',
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
        Clientes::create($input);
        EnderecoClientes::create($input);
        return redirect()->route('clientes')
        ->with('success','Cadastrado com sucesso!');
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
        $enderecos = EnderecoClientes::with('enderecos')->get();
        return view('Sistema.Empresa.Cadastros.Clientes.show', compact('cliente','enderecos','generos','empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $generos = Generos::with('generos')->get();
        $empresas = Empresas::with('empresas')->get();
        $clientes = Clientes::find($id);
        $enderecos = Enderecoclientes::find($id);
        return view('Sistema.Empresa.Cadastros.Clientes.editar', ['clientes' => $clientes,'enderecos' => $enderecos,'generos' => $generos,'empresas' => $empresas]);
    }
    public function update(Request $request, $id)
    {
        $cliente = Clientes::find($id);
        $endereco = EnderecoClientes::find($id);
        $request->validate([
            'active' => 'required|boolean',
            'name' => 'required|string',
            'cpf' => 'required|string',
            'email' => 'required|email',
            'genero_id' => 'required|string',
            'empresa_id' => 'required|string',
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

        $cliente->update($input);
        $endereco->update($input);
        return redirect()->route('clientes')->with('success', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Clientes $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes')->with('success','Excluído com sucesso');
    }
    public function export()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }
}
