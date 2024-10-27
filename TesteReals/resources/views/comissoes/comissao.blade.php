@extends('layouts.app')

@section('title', 'Comissões')

@section('content')

<div class="container">
    <header class="sub-header d-flex justify-content-between align-items-center p-5 py-2 mt-5 rounded" style="background-color: #505050; width:100%;">
        <h2 class="text-white">Gerenciamento de comissões </h2>
        <!-- Botão de Criar -->
        <a id="btn-create-header" class="btn btn-success text-white btn-sm fs-6 fw-bold rounded p-2 mb-2" href="{{ route('comissoes.create', $afiliado->id) }}">Criar Comissão
        </a>
    </header>

    <!-- MENSAGEM DE ERRO DO BACK -->
    @if (session('error'))
    <div class="alert alert-danger text-center mt-3">
        {{ session('error') }}
    </div>
    @endif

    <!-- MENSAGEM DE ERROS DE VALIDAÇÃO -->
    @if ($errors->any())
    <div class="alert alert-danger text-center mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- MENSAGEM DE SUCESSO DO BACK -->
    @if (session('status'))
    <div class="alert alert-success text-center mt-3">
        {{ session('status') }}
    </div>
    @endif

    @if ($comissoes->isEmpty())
    <p class="text-center mt-3"><strong>Nenhuma comissão encontrada para este afiliado.</strong> </p>
    @else
    <div class="row justify-content-center">
        <div class=" mt-3 p-3 text-center rounded" style="background-color: #4F4F4F;">
            <div class="overflow-y-auto max-h-screen text-white dark:text-gray-100">
                <table class="table-auto mx-auto w-full text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="px-4 py-2">Nome do afiliado</th>
                            <th scope="col" class="px-4 py-2">Valor</th>
                            <th scope="col" class="px-4 py-2">Data</th>
                            <th scope="col" class="px-4 py-2">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($afiliado->comissoes as $comissao)
                        <tr>
                            <td class="border px-4 py-2">{{ $comissao->afiliado->nome }}</td>
                            <td class="border px-4 py-2">{{ $comissao->valor }}</td>
                            <td class="border px-4 py-2">{{ $comissao->data }}</td>
                            <td class="border px-4 py-2">
                                <div class="d-flex justify-content-end p-4">
                                    <a href="{{ route('comissoes.edit', $comissao->id) }}" class="btn btn-primary text-white m-2 px-3 py-2 rounded text-center">
                                        Editar
                                    </a>
                                    <form action="{{ route('comissoes.destroy', $comissao->id) }}" method="POST" class="ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-white m-2 px-3 py-2 rounded text-center">
                                            Deletar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
