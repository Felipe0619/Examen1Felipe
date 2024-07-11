<!-- resources/views/apuestas/buscar_por_juego.blade.php -->

@extends('layouts.app')

@section('title', 'Buscar Apuestas por Juego')

@section('content')
    <h1>Buscar Apuestas por Juego: {{ $nombreJuego }}</h1>

    <ul>
        @foreach ($apuestas as $apuesta)
            <li>
                Fecha: {{ $apuesta->fecha }} - Monto: {{ $apuesta->monto }} - Juego: {{ $apuesta->juego->nombre }}
            </li>
        @endforeach
    </ul>
@endsection
