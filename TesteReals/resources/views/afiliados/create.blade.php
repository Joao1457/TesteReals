@extends('layouts.app')

@section('title', 'Cadastro de Afiliado')

@section('content')
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
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md bg-secondary rounded p-5">
            <form method="POST" action="{{ route('afiliados.store') }}" class="row g-3">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control custom-border" id="nome" name="nome" placeholder="Digite o nome">
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="cpf form-control" id="cpf" name="cpf">
                </div>
                <div class="col-md-6">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" pattern="\d{2}/\d{2}/\d{4}" class="form-control" id="data_nascimento" name="data_nascimento">
                </div>
                <div class="col-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="">
                </div>
                <div class="col-md-4">
                    <label for="estado" class="form-label">Estado</label>
                    <select id="estado" name="estado" class="form-select">
                        <option selected>Selecione um Estado...</option>
                        @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">
                            {{ $estado->nome }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <select id="cidade" name="cidade" class="form-select">
                        <option selected>Selecione uma cidade...</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
            <script>
                // script para função do select estado e cidade
                document.addEventListener('DOMContentLoaded', function(){

                    var inputSelectEstado = document.querySelector('#estado');
                    var inputSelectCidade = document.querySelector('#cidade');

                    inputSelectEstado.addEventListener('change', () =>{
                        pesquisarCidade();
                    });

                    function pesquisarCidade(){
                        inputSelectCidade.innerHTML = `<option value="">Carregando ... </option>`;

                        var selectCidades = "{{route('cidades.select')}}";

                        axios.post(selectCidades, {
                            estado_id: inputSelectEstado.value,
                        }).then(response => {
                            inputSelectCidade.innerHTML = `<option value="">Selecione</option>`;

                            response.data.forEach(row => {
                                inputSelectCidade.innerHTML += `<option value="${row.nome}">${row.nome}</option>`;
                            })
                        }).catch(error => {
                            inputSelectCidade.innerHTML = `<option value="">Nenhuma cidade encontrada</option>`;
                        });
                    }
                })
            </script>
        </div>
    </div>
</div>
@endsection
