@extends('layouts.app')

@section('title', 'Afiliados')

@section('content')

<div class="container">
    <header class="sub-header d-flex justify-content-between align-items-center p-5 py-2 mt-5 rounded" style="background-color: #505050; width:100%;">
        <h2 class="text-white">Gerenciamento de Afiliados</h2>
        <!-- Botão de Criar -->
        <a id="btn-create-header" class="btn btn-success text-white btn-sm fs-6 fw-bold rounded p-2 mb-2" href="{{ route('afiliados.create') }}" title="Criar Novo Usuário" style="line-height: 1.5;">
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
            <div class="overflow-y-auto max-h-screen  text-white dark:text-gray-100">
                <form action="{{ route('afiliados.afiliadoStatus') }}" method="POST">
                    @csrf
                    <table class="table-auto mx-auto w-full text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">Nome</th>
                                <th scope="col" class="px-4 py-2">CPF</th>
                                <th scope="col" class="px-4 py-2">Data de Nascimento</th>
                                <th scope="col" class="px-4 py-2">Email</th>
                                <th scope="col" class="px-4 py-2">Telefone</th>
                                <th scope="col" class="px-4 py-2">Endereço</th>
                                <th scope="col" class="px-4 py-2">Estado</th>
                                <th scope="col" class="px-4 py-2">Cidade</th>
                                <th scope="col" class="px-4 py-2">Ações</th>
                                <th scope="col" class="px-4 py-2">Status</th>
                                <th scope="col" class="px-4 py-2">Comissões</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($afiliados as $afiliado)
                            <tr>
                                <td class="border px-4 py-2">{{ $afiliado -> nome }}</td>
                                <td class="border px-4 py-2">{{ $afiliado -> cpf }}</td>
                                <td class="border px-4 py-2">{{ $afiliado -> data_nascimento }}</td>
                                <td class="border px-4 py-2">{{ $afiliado -> email }}</td>
                                <td class="border px-4 py-2">{{ $afiliado -> telefone }}</td>
                                <td class="border px-4 py-2">{{ $afiliado -> endereco }}</td>
                                <td class="border px-4 py-2">{{ $afiliado->estado}}</td>
                                <td class="border px-4 py-2">{{ $afiliado -> cidade }}</td>
                                <td class="border px-4 py-2">
                                    <div class="d-flex justify-content-end p-3">
                                        <a href="" class="bg-primary text-white px-3 py-2 rounded text-center">
                                            Editar
                                        </a>
                                    </div>
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="d-flex justify-content-end p-3">
                                        <div class="form-group">
                                            <select name="status[{{ $afiliado->id }}]"
                                                id="status{{ $afiliado->id }}"
                                                class="form-select bg-light text-dark w-auto">
                                                <option value="enabled" {{ $afiliado->status == 'enabled' ? 'selected' : '' }}>
                                                    Habilitado
                                                </option>
                                                <option value="disabled" {{ $afiliado->status == 'disabled' ? 'selected' : '' }}>
                                                    Desabilitado
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td class="border px-4 py-2">comissão</td>
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
