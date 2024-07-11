<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Apuestas')</title>
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('apuestas.index') }}">Lista de Apuestas</a></li>
                <li><a href="{{ route('apuestas.create') }}">Crear Nueva Apuesta</a></li>
            </ul>
        </nav>
    </header>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Scripts JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
