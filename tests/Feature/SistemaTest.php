<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Viaje;
use App\Models\Usuario;
use App\Models\ClienteViaje;

class SistemaTest extends TestCase
{
    public function test_full_user_and_trip_workflow()
    {
        // Create a user
        $userData = [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'idTipoUsuario' => 1,
        ];

        $userResponse = $this->postJson('/api/usuario', $userData);

        $this->assertDatabaseHas('usuario', [
            'nombre' => 'John',
            'apellido' => 'Doe',
        ]);

        $user = Usuario::where('nombre', 'John')->where('apellido', 'Doe')->first();
        $this->assertNotNull($user);

        $user = Usuario::factory()->create();

        $data = [
            'puntoDePartida' => 'Punto A',
            'puntoDeLlegada' => 'Punto B',
            'idRuta' => 1,
            'idEstadoConfirmacion' => 1,
            'idCliente' => $user->idUsuario,
        ];

        $response = $this->postJson('/api/viajes', $data);

        $this->assertDatabaseHas('viaje', [
            'puntoDePartida' => 'Punto A',
            'puntoDeLlegada' => 'Punto B',
            'idRuta' => 1,
            'idEstadoConfirmacion' => 1,
        ]);

        $trip = Viaje::where('puntoDePartida', 'Punto A')->where('puntoDeLlegada', 'Punto B')->first();
        $this->assertNotNull($trip);

        // Verify user exists
        $userShowResponse = $this->getJson("/api/usuario/{$user->idUsuario}");
        $userShowResponse->assertStatus(200);
        $this->assertDatabaseHas('usuario', [
            'nombre' => 'John',
            'apellido' => 'Doe',
        ]);

        $tripShowResponse = $this->getJson("/api/viajes/{$trip->idViaje}");
        $tripShowResponse->assertStatus(200);
        $this->assertDatabaseHas('viaje', [
            'puntoDePartida' => 'Punto A',
            'puntoDeLlegada' => 'Punto B',
            'idRuta' => 1,
            'idEstadoConfirmacion' => 1,
        ]);
    }
}
