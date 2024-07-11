<!-- resources/views/apuestas/dinero_apuestas_cartas.blade.php -->

@extends('layouts.app')

@section('title', 'Comparación de Dinero en Apuestas')

@section('content')
    <h1>Comparación de Dinero en Apuestas</h1>

    <p>Dinero total en apuestas de juegos de cartas: {{ $dineroApuestasCartas }}</p>
    <p>Dinero total en apuestas de juegos que no son de cartas: {{ $dineroApuestasNoCartas }}</p>

    @if ($mayorDineroCartas)
        <p>El dinero total en apuestas de juegos de cartas es mayor.</p>
    @else
        <p>El dinero total en apuestas de juegos que no son de cartas es mayor o igual.</p>
    @endif
@endsection
