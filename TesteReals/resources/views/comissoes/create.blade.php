@extends('layouts.app')

@section('title', 'Criação de comissão')

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
            <form method="POST" action="{{ route('comissoes.store') }}" class="row g-3">
                @csrf
                <input type="hidden" name="afiliado_id" value="{{ $afiliadoId }}">
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" class="form-control custom-border" id="valor" name="valor" placeholder="Digite o valor da comissão">
                </div>
                <div class="col-md-6">
                    <label for="data" class="form-label">Data de Nascimento</label>
                    <input type="date" pattern="\d{2}/\d{2}/\d{4}" class="form-control" id="data" name="data">
                </div>
                 <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
