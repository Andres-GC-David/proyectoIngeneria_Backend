<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_store_usuario()
    {
        $data = [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'idTipoUsuario' => 1,
        ];

        $response = $this->postJson('/api/usuario', $data);

        $this->assertDatabaseHas('usuario', [
            'nombre' => 'John',
            'apellido' => 'Doe',
        ]);
    }
}
