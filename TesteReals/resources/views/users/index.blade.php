@extends('layouts.app')

@section('title', 'Usuários')

@section('content')

<div class="container">
    <header class="sub-header d-flex justify-content-between align-items-center p-5 py-2 mt-5 rounded" style="background-color: #505050; width:100%;">
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

    <div class="row justify-content-center">
        <div class=" mt-3 p-3 text-center rounded" style="background-color: #4F4F4F;">
            <div class="overflow-y-auto max-h-screen p-6 text-white dark:text-gray-100">
                <form action="{{ route('users.updateStatus') }}" method="POST">
                    @csrf
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">Nome</th>
                                <th scope="col" class="px-4 py-2">Email</th>
                                <th scope="col" class="px-4 py-2">Ações</th>
                                <th scope="col" class="px-4 py-2">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    <div class="d-flex justify-content-end p-3">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary text-white px-3 py-2 rounded text-center">
                                            Editar
                                        </a>
                                    </div>
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="d-flex justify-content-end p-3">
                                        <div class="form-group">
                                            <!-- seleção para definir o status do usuario -->
                                            <select name="status[{{ $user->id }}]"
                                                id="status{{ $user->id }}"
                                                class="form-select bg-light text-dark w-auto">
                                                <option value="enabled" {{ $user->status == 'enabled' ? 'selected' : '' }}>
                                                    Habilitado
                                                </option>
                                                <option value="disabled" {{ $user->status == 'disabled' ? 'selected' : '' }}>
                                                    Desabilitado
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Botão de Salvar -->
                    <div class="d-flex justify-content-center mt-4">
                        <button class="btn btn-primary" type="submit">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
