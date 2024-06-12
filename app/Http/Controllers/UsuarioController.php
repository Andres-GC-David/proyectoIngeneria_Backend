<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    public function index(){

        $usuario = Usuario::all();
 
        if($usuario->count()>0)
        {
             return response()->json([
 
                 'status'=> 200,
                 'usuario'=> $usuario
 
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

    public function show($idUsuario)
    {

        $usuario = Usuario::where('idUsuario', $idUsuario)->first();

       if($usuario)
       {
            return response()->json([

                'status'=> 200,
                'usuario'=> $usuario

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

    public function store(Request $request)
    {
     
        $validator = Validator::make($request->all(),[

            'nombre' => 'required',
            'apellido' => 'required',
            'idTipoUsuario' => 'required',
            
        ]);

        if($validator->fails()){

            return response()->json([

                'status'=> 422,
                'errors'=> $validator->messages()

            ], 422);

        }

        else{

            $usuario = Usuario::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'idTipoUsuario' => $request->idTipoUsuario,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            if($usuario)
            {

                $usuario->save();
                return response()->json($usuario);

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
