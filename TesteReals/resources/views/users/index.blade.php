@extends('layouts.app')

@section('title', 'Usuários')

@section('content')

<div class="container">
    <header class="sub-header d-flex justify-content-between align-items-center p-4 py-2 mt-5 rounded" style="background-color: #505050;">
        <h2 class="text-white">Gerenciamento de Usuários</h2>
        <!-- Botão de Criar -->
        <a id="btn-create-header" class="btn btn-success text-white btn-sm fs-6 fw-bold rounded p-2 mb-2" href="{{ route('users.create') }}" title="Criar Novo Usuário" style="line-height: 1.5;">
            Criar +
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
    <div class="row justify-content-center" >
        <div class="col-md-8 mt-3 p-3 text-center rounded" style="background-color: #4F4F4F;" >
            <div class="overflow-y-auto max-h-screen p-6 text-white dark:text-gray-100" >
                <table class="table-auto mx-auto w-full text-center">
                    <thead>
                        <tr>
                            <th scope="col" class="px-4 py-2">Nome</th>
                            <th scope="col" class="px-4 py-2">Email</th>
                            <th scope="col" class="px-4 py-2">Ações</th>
                        </tr>
                    </thead>
                    <!-- abaixo o trecho referente ao conteudo das tabelas  -->
                    @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{$user->email}}</td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-center p-2 space-x-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-primary text-white px-3 py-2 rounded text-center">
                                        Editar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
