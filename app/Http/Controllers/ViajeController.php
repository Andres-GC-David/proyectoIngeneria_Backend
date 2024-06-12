<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viaje;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ViajeController extends Controller
{
    public function index(){

        $viaje = Viaje::all();
 
        if($viaje->count()>0)
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
                 'message'=> "No Records Found"
 
              ], 404);
         
        }
 
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
                'message'=> "Trip Not Found"

             ], 404);
        
       }

    }

    public function store(Request $request)
    {
     
        $validator = Validator::make($request->all(),[

            'puntoDeLlegada' => 'required',
            'puntoDePartida' => 'required',
            'idRuta' => 'required',
            'idEstadoConfirmacion' => 'required',
            
        ]);

        if($validator->fails()){

            return response()->json([

                'status'=> 422,
                'errors'=> $validator->messages()

            ], 422);

        }

        else{

            $viaje = Viaje::create([
                'puntoDeLlegada' => $request->puntoDeLlegada,
                'puntoDePartida' => $request->puntoDePartida,
                'idRuta' => $request->idRuta,
                'idEstadoConfirmacion' => $request->idEstadoConfirmacion,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            if($viaje)
            {

                $viaje->save();
                return response()->json($viaje);

            }
            else
            {
                return response()->json([

                    'status'=> 500,
                    'message'=> "Something Went Wrong"
    
                ], 500);
            }

        }

    }
}
