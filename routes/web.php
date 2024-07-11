<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApuestaController;

Route::get('/apuestas', [ApuestaController::class, 'index'])->name('apuestas.index');
Route::get('/apuestas/create', [ApuestaController::class, 'create'])->name('apuestas.create');
Route::post('/apuestas', [ApuestaController::class, 'store'])->name('apuestas.store');
Route::get('/apuestas/{apuesta}', [ApuestaController::class, 'show'])->name('apuestas.show');
Route::get('/apuestas/{apuesta}/edit', [ApuestaController::class, 'edit'])->name('apuestas.edit');
Route::put('/apuestas/{apuesta}', [ApuestaController::class, 'update'])->name('apuestas.update');
Route::delete('/apuestas/{apuesta}', [ApuestaController::class, 'destroy'])->name('apuestas.destroy');

// Funcionalidades adicionales
Route::get('/apuestas/mas-de-tres-jugadores', [ApuestaController::class, 'apuestasMasDeTresJugadores'])->name('apuestas.mas_de_tres_jugadores');
Route::get('/apuestas/dinero-apuestas-cartas', [ApuestaController::class, 'dineroTotalApuestasCartas'])->name('apuestas.dinero_apuestas_cartas');
Route::post('/apuestas/buscar-por-juego', [ApuestaController::class, 'buscarPorJuego'])->name('apuestas.buscar_por_juego');
