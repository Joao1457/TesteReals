<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comissao;
use App\Models\Afiliado;

class ComissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $afiliadoId)
    {
        return view('comissoes.create', compact('afiliadoId'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'afiliado_id' => 'required|exists:afiliados,id',
        ], [
            'valor.required' => 'Informe o valor da comissão.',
            'valor.numeric' => 'Digite o valor correto!',
            'data.required' => 'Insira a data comissão!',
            'data_vencimento.date' => 'Insira uma data válida!',
        ]);


        try {

            Comissao::create([
                'afiliado_id' => $request->afiliado_id,
                'valor' => $request->valor,
                'data' => $request->data,
            ]);

            return redirect()->route('afiliados.index')->with('status', 'Comissão criada com sucesso!');
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Ocorreu um erro ao criar uma comissão. Por favor, tente novamente.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $afiliado = Afiliado::findOrFail($id);
        $comissoes = $afiliado->comissoes;

        return view('comissoes.comissao', compact('comissoes', 'afiliado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comissao = Comissao::findOrFail($id);
        $afiliado = $comissao->afiliado;

        return view('comissoes.edit', compact('comissao', 'afiliado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedComissao = $request->validate([
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'afiliado_id' => 'required|exists:afiliados,id',
        ], [
            'valor.required' => 'Informe o valor da comissão.',
            'valor.numeric' => 'Digite o valor correto!',
            'data.required' => 'Insira a data comissão!',
            'data_vencimento.date' => 'Insira uma data válida!',
        ]);


        try {

            $comissoes = Comissao::findOrFail($id);
            $comissoes->update($validatedComissao);

            return redirect()->route('afiliados.index')->with('status', 'Comissão atualizada com sucesso!');
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Ocorreu um erro ao editar a comissão. Por favor, tente novamente.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $comissoes = Comissao::findOrFail($id);
            $comissoes->delete();
            session()->flash('status', 'Comissão excluída com sucesso!');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao excluir a comissão. Por favor, tente novamente.');
            return redirect()->back();
        }
    }
}
