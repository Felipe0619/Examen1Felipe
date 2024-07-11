<@extends('layouts.app')

@section('content')
    <h1>Listado de Apuestas</h1>

    <ul>
        @foreach ($apuestas as $apuesta)
            <li>
                {{ $apuesta->id }} - {{ $apuesta->fecha }} - {{ $apuesta->monto }}
                <a href="{{ route('apuestas.show', $apuesta->id) }}">Ver</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('apuestas.create') }}">Crear Nueva Apuesta</a>
@endsection
