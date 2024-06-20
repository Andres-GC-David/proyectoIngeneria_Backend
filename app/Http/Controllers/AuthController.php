<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\Telefono;
use Twilio\Rest\Client;
use App\Models\CodigoVerificacion;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $usuario = Usuario::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'idTipoUsuario' => 1,
        ]);

        Telefono::create([
            'idUsuario' => $usuario->idUsuario,
            'telefono' => $data['telefono'],
        ]);

        return response()->json(['message' => 'Usuario registrado correctamente.'], 201);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'telefono' => ['required', 'string'],
        ]);

        $telefono = Telefono::where('telefono', $data['telefono'])->first();

        if (!$telefono) {
            return response()->json(['error' => 'Número de teléfono no registrado.'], 404);
        }

        $codigo = rand(100000, 999999);

        CodigoVerificacion::create([
            'telefono' => $data['telefono'],
            'codigo' => $codigo,
        ]);

        $twilio_sid = config('services.twilio.sid');
        $twilio_auth_token = config('services.twilio.auth_token');
        $twilio_from = config('services.twilio.from'); // El número de teléfono de Twilio

        $twilio = new Client($twilio_sid, $twilio_auth_token);

        $twilio->messages->create($data['telefono'], [
            'from' => $twilio_from,
            'body' => "Su código de verificación es: $codigo",
        ]);

        return response()->json(['message' => 'Código de verificación enviado.'], 200);
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'codigo' => ['required', 'string'],
            'telefono' => ['required', 'string'],
        ]);

        $codigoVerificacion = CodigoVerificacion::where('telefono', $data['telefono'])
            ->where('codigo', $data['codigo'])
            ->first();

        if ($codigoVerificacion) {
            $telefono = Telefono::where('telefono', $data['telefono'])->first();

            if (!$telefono) {
                return response()->json(['error' => 'Número de teléfono no encontrado.'], 404);
            }

            $telefono->isVerified = true;
            $telefono->save();

            $usuario = Usuario::find($telefono->idUsuario);
            Auth::login($usuario);

            return response()->json(['message' => 'Número de teléfono verificado y usuario autenticado.'], 200);
        }

        return response()->json(['error' => 'Código de verificación inválido.'], 400);
    }
}
