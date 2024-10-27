<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/app.js'])


    <style>
        body {
            background-color: hsla(0, 100%, 70%, 0.3);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="navbar navbar-expand-lg d-flex justify-content-center py-3" style="background-color: #505050;">
        <ul class="nav nav-pills fw-bold text-white">
            <!-- rotas para as funções do sistema -->
            <li class="nav-item"><a href="/" class="nav-link text-white">Home</a></li>
            <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link text-white">Usuários</a></li>
            <li class="nav-item"><a href="{{ route('afiliados.index') }}" class="nav-link text-white">Afiliados</a></li>
        </ul>
    </header>

    <!-- Conteúdo Principal -->
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                    @yield('content')
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center py-3">
        <p>&copy; {{ date('Y') }} Teste Reals</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
