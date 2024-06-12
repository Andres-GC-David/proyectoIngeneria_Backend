<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chofer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ChoferController extends Controller
{
    public function index(){

        $chofer = Chofer::all();
 
        if($chofer->count()>0)
        {
             return response()->json([
 
                 'status'=> 200,
                 'chofer'=> $chofer
 
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

    public function show($idChofer)
    {

        $chofer = Chofer::where('idChofer', $idChofer)->first();

       if($chofer)
       {
            return response()->json([

                'status'=> 200,
                'chofer'=> $chofer

            ], 200);
       }
       else
       {

            return response()->json([

                'status'=> 404,
                'message'=> "Driver Not Found"

             ], 404);
        
       }

    }

    public function store(Request $request)
    {
     
        $validator = Validator::make($request->all(),[

            'idUsuario' => 'required',
            'idVehiculo' => 'required',
            
        ]);

        if($validator->fails()){

            return response()->json([

                'status'=> 422,
                'errors'=> $validator->messages()

            ], 422);

        }

        else{

            $chofer = Chofer::create([
                'idUsuario' => $request->idUsuario,
                'idVehiculo' => $request->idVehiculo,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ]);

            if($chofer)
            {

                $chofer->save();
                return response()->json($chofer);

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
