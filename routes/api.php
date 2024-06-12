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

Route::get('/viaje', [ViajeController::class, 'index'])->name('viaje.index');
Route::post('/viaje', [ViajeController::class, 'store'])->name('viaje.store');
Route::get('/viaje/{idViaje}', [ViajeController::class, 'show'])->name('viaje.show');
