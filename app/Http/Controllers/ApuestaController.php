<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apuesta;
use App\Models\Juego;

class ApuestaController extends Controller
{
    public function index()
    {
        $apuestas = Apuesta::with('juego')->get();
        return view('apuestas.index', compact('apuestas'));
    }

    public function create()
    {
        $juegos = Juego::all();
        return view('apuestas.create', compact('juegos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric|min:0',
        ]);

        Apuesta::create($request->all());

        return redirect()->route('apuestas.index')
                         ->with('success','Apuesta creada exitosamente.');
    }

    public function show(Apuesta $apuesta)
    {
        return view('apuestas.show', compact('apuesta'));
    }

    public function edit(Apuesta $apuesta)
    {
        $juegos = Juego::all();
        return view('apuestas.edit', compact('apuesta', 'juegos'));
    }

    public function update(Request $request, Apuesta $apuesta)
    {
        $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'fecha' => 'required|date',
            'monto' => 'required|numeric|min:0',
        ]);

        $apuesta->update($request->all());

        return redirect()->route('apuestas.index')
                         ->with('success','Apuesta actualizada exitosamente.');
    }

    public function destroy(Apuesta $apuesta)
    {
        $apuesta->delete();

        return redirect()->route('apuestas.index')
                         ->with('success','Apuesta eliminada exitosamente.');
    }

    // Funcionalidad adicional a: Obtener las apuestas de los juegos con cantidad de jugadores mayor a 3.
    public function apuestasMasDeTresJugadores()
    {
        $apuestasMasDeTresJugadores = Apuesta::whereHas('juego', function ($query) {
            $query->where('cantidad_jugadores', '>', 3);
        })->get();

        return view('apuestas.mas_de_tres_jugadores', compact('apuestasMasDeTresJugadores'));
    }

    // Funcionalidad adicional b: Chequear si el dinero total de las apuestas en juegos de cartas es mayor al de juegos que no son de cartas
    public function dineroTotalApuestasCartas()
    {
        $dineroApuestasCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', true);
        })->sum('monto');

        $dineroApuestasNoCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', false);
        })->sum('monto');

        $mayorDineroCartas = $dineroApuestasCartas > $dineroApuestasNoCartas;

        return view('apuestas.dinero_apuestas_cartas', compact('dineroApuestasCartas', 'dineroApuestasNoCartas', 'mayorDineroCartas'));
    }

    // Funcionalidad adicional c: Buscar apuestas por un cierto juego
    public function buscarPorJuego(Request $request)
    {
        $request->validate([
            'nombre_juego' => 'required|string',
        ]);

        $nombreJuego = $request->nombre_juego;
        $apuestas = Apuesta::whereHas('juego', function ($query) use ($nombreJuego) {
            $query->where('nombre', 'like', '%' . $nombreJuego . '%');
        })->get();

        return view('apuestas.buscar_por_juego', compact('apuestas', 'nombreJuego'));
    }
}
