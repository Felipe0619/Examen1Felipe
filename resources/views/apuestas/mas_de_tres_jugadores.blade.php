<!-- resources/views/apuestas/mas_de_tres_jugadores.blade.php -->

@extends('layouts.app')

@section('title', 'Apuestas en Juegos con Más de 3 Jugadores')

@section('content')
    <h1>Apuestas en Juegos con Más de 3 Jugadores</h1>

    <ul>
        @foreach ($apuestasMasDeTresJugadores as $apuesta)
            <li>
                Fecha: {{ $apuesta->fecha }} - Monto: {{ $apuesta->monto }} - Juego: {{ $apuesta->juego->nombre }}
            </li>
        @endforeach
    </ul>
@endsection
