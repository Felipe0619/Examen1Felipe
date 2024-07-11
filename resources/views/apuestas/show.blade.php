@extends('layouts.app')

@section('content')
    <h1>Detalles de la Apuesta</h1>

    <p>ID: {{ $apuesta->id }}</p>
    <p>Fecha: {{ $apuesta->fecha }}</p>
    <p>Monto: {{ $apuesta->monto }}</p>

    <a href="{{ route('apuestas.edit', $apuesta->id) }}">Editar</a>
    <form action="{{ route('apuestas.destroy', $apuesta->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
@endsection
