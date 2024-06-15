<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ChoferController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ViajeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Rutas de UsuarioController

Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');
Route::post('/usuario', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/{idUsuario}', [UsuarioController::class, 'show'])->name('usuario.show');

//Rutas de ChoferController

Route::get('/chofer', [ChoferController::class, 'index'])->name('chofer.index');
Route::post('/chofer', [ChoferController::class, 'store'])->name('chofer.store');
Route::get('/chofer/{idChofer}', [ChoferController::class, 'show'])->name('chofer.show');


//Rutas de ClienteController

Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente/{idCliente}', [ClienteController::class, 'show'])->name('cliente.show');

//Rutas de ViajeController

Route::post('/viajes', [ViajeController::class, 'store'])->name('viajes.store');
Route::get('/viajes/{idViaje}', [ViajeController::class, 'show'])->name('viajes.show');

// Aceptar un viaje
Route::post('/viajes/{viaje}/accept', [ViajeController::class, 'accept'])->name('viajes.accept');
// Empezar un viaje
Route::post('/viajes/{viaje}/start', [ViajeController::class, 'start'])->name('viajes.start');
// Terminar un viaje
Route::post('/viajes/{viaje}/end', [ViajeController::class, 'end'])->name('viajes.end');
// Actualizar la ubicación del conductor en un viaje
Route::post('/viajes/{viaje}/location', [ViajeController::class, 'location'])->name('viajes.location');
