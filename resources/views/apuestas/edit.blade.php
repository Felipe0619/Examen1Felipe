<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Apuesta</title>
</head>
<body>
    <h1>Editar Apuesta</h1>

    <form action="{{ route('apuestas.update', $apuesta->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Campos del formulario para editar una apuesta existente -->
    </form>
</body>
</html>
