<?php

namespace App\Http\Controllers;

use App\Events\TripAccepted;
use App\Events\TripCreated;
use App\Events\TripEnded;
use App\Events\TripLocationUpdated;
use App\Events\TripStarted;
use App\Models\Viaje;
use App\Models\ClienteViaje;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ViajeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'puntoDePartida' => 'required',
            'puntoDeLlegada' => 'required',
            'idRuta' => 'required',
            'idEstadoConfirmacion' => 'required',
            'idCliente' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ], 422);
        }

        // Create the trip
        $viaje = Viaje::create([
            'puntoDePartida' => $request->puntoDePartida,
            'puntoDeLlegada' => $request->puntoDeLlegada,
            'idRuta' => $request->idRuta,
            'idEstadoConfirmacion' => $request->idEstadoConfirmacion,
        ]);

        // Create the relationship with ClienteViaje
        ClienteViaje::create([
            'idViaje' => $viaje->idViaje,
            'idCliente' => $request->idCliente,
        ]);

        // Get the correct user
        $user = Usuario::find($request->idCliente);

        if ($user) {
            // Dispatch TripCreated event with the user
            TripCreated::dispatch($viaje, $user);
        } else {
            return response()->json(['error' => 'Usuario no encontrado'], 400);
        }

        return response()->json($viaje, 201);
    }

    public function show($idViaje)
    {

        $viaje = Viaje::where('idViaje', $idViaje)->first();

       if($viaje)
       {
            return response()->json([

                'status'=> 200,
                'viaje'=> $viaje

            ], 200);
       }
       else
       {

            return response()->json([

                'status'=> 404,
                'message'=> "User Not Found"

             ], 404);
        
       }

    }

    public function accept(Request $request, Viaje $viaje)
    {
        $request->validate([
            'driver_location' => 'required'
        ]);

        $viaje->update([
            'driver_id' => $request->user()->id,
            'driver_location' => $request->driver_location,
        ]);

        $viaje->load('driver.user');

        TripAccepted::dispatch($viaje, $viaje->user);

        return $viaje;
    }

    public function start(Request $request, Viaje $viaje)
    {
        $viaje->update([
            'is_started' => true
        ]);

        $viaje->load('driver.user');

        TripStarted::dispatch($viaje, $viaje->user);

        return $viaje;
    }

    public function end(Request $request, Viaje $viaje)
    {
        $viaje->update([
            'is_complete' => true
        ]);

        $viaje->load('driver.user');

        TripEnded::dispatch($viaje, $viaje->user);

        return $viaje;
    }

    public function location(Request $request, Viaje $viaje)
    {
        $request->validate([
            'driver_location' => 'required'
        ]);

        $viaje->update([
            'driver_location' => $request->driver_location
        ]);

        $viaje->load('driver.user');

        TripLocationUpdated::dispatch($viaje, $viaje->user);

        return $viaje;
    }
}
