@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Apuesta</h1>

    <form action="{{ route('apuestas.store') }}" method="POST">
        @csrf
        <div>
            <label for="id_juego">Juego:</label>
            <select name="id_juego" id="id_juego">
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="fecha">Fecha:</label>
            <input type="datetime-local" id="fecha" name="fecha" required>
        </div>

        <div>
            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto" required>
        </div>

        <button type="submit">Guardar Apuesta</button>
    </form>
@endsection
