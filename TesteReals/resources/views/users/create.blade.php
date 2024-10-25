@extends('layouts.app')

@section('title', 'Criação de Usuário')

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
        <div class="col-md-6 bg-secondary rounded p-5">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control custom-border" id="name" name="name" placeholder="Digite o nome">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Sua senha deve ter entre 8 e 20 caracteres, conter letras e números, e não deve conter espaços, caracteres especiais ou emojis.
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <button class="btn btn-primary mx-2" type="submit">Registrar usuário</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger mx-2" role="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
