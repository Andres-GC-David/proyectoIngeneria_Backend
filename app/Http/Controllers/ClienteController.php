<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index(){

        $cliente = Cliente::all();
 
        if($cliente->count()>0)
        {
             return response()->json([
 
                 'status'=> 200,
                 'cliente'=> $cliente
 
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

    public function show($idCliente)
    {

        $cliente = Cliente::where('idCliente', $idCliente)->first();

       if($cliente)
       {
            return response()->json([

                'status'=> 200,
                'cliente'=> $cliente

            ], 200);
       }
       else
       {

            return response()->json([

                'status'=> 404,
                'message'=> "Client Not Found"

             ], 404);
        
       }

    }

    public function store(Request $request)
    {
     
        $validator = Validator::make($request->all(),[

            'fechaDeNacimiento' => 'required',
            'idUsuario' => 'required',
            
        ]);

        if($validator->fails()){

            return response()->json([

                'status'=> 422,
                'errors'=> $validator->messages()

            ], 422);

        }

        else{

            $cliente = Cliente::create([
                'fechaDeNacimiento' => $request->fechaDeNacimiento,
                'idUsuario' => $request->idUsuario,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            if($cliente)
            {

                $cliente->save();
                return response()->json($cliente);

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
