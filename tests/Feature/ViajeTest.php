<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Viaje;
use App\Models\Usuario;
use App\Models\ClienteViaje;

class ViajeTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_store_viaje()
    {
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

    }
}
