<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\afiliados;
use App\Models\Comissao;
use App\Models\Afiliado;
use App\Models\Estado;
use App\Models\Cidade;

class AfiliadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $afiliados = Afiliado::all();
        $estados = Estado::all();
        $cidades = Cidade::all();
        return view('afiliados.index', compact('afiliados','estados','cidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $estado = Estado::orderBy('nome', 'ASC')->get();
        // dd($estado);
        return view('afiliados.create', ['estados'=> $estado]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedAfiliado = $request->validate([
            'nome' => 'required|min:5|max:100|string',
            'email' => 'required|email|max:255|unique:afiliados,email',
            'cpf' => 'required|string',
            'data_nascimento' => 'required|date',
            'endereco' => 'required',
            'telefone' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
        ], [
            'nome.required' => 'Informe o nome do afiliado.',
            'nome.min' => 'Insira no mínimo 5 caracteres para prosseguir!',
            'nome.max' => 'O limite máximo do nome é de 100 caracteres!',
            'email.required' => 'Insira um email.',
            'email.email' => 'O formato do email está inválido.',
            'email.max' => 'O limite máximo do email é de 255 caracteres!',
            'email.unique' => 'Esse email já está sendo utilizado. Por favor, escolha outro.',
            'cpf.required' => 'Digite um cpf!',
            'data_vencimento.required'=>'Insira uma data!',
            'data_vencimento.date'=>'Insira uma data válida!',
            'endereco.required' => 'Digite o endereço do afiliado!',
            'telefone.required' => 'Insira o numero de telefone do afiliado.',
            'estado.required' => 'Selecione um estado.',
            'cidade.required' => 'Selecione uma cidade.',
        ]);

        $validatedAfiliado['cpf'] = preg_replace('/[^0-9]/', '', $request->cpf);
        $estado = Estado::findOrFail($request->estado);



        try {
            $afiliado = Afiliado::create($validatedAfiliado);
            $afiliado->estado = $estado->nome;

            session()->flash('status', 'Afiliado criado com sucesso!');
            return redirect()->route('afiliados.index');
        } catch (\Exception $e) {
            // dd($e);
            session()->flash('error', 'Ocorreu um erro ao adicionar um afiliado. Por favor, tente novamente.');
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function afiliadoStatus(Request $request){

        $status = $request->input('status');

        foreach ($status as $afiliadoId => $status){
            $afiliados = Afiliado::find($afiliadoId);
            if($afiliados){
                $afiliados->status = $status;
                $afiliados->save();
            }
        }
        return redirect()->back()->with('status','Alterações atualizadas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
