<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chofer;
use App\Models\ChoferViaje;
use App\Models\ClienteViaje;
use App\Models\Color;
use App\Models\EstadoConfirmacion;
use App\Models\Marca;
use App\Models\Ruta;
use App\Models\TipoPago;
use App\Models\TipoUsuario;
use App\Models\Usuario;
use App\Models\Vehiculo;
use App\Models\Viaje;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TipoUsuarioTableSeeder::class,
            UsuarioTableSeeder::class,
            ClienteTableSeeder::class,
            MarcaTableSeeder::class,
            ColorTableSeeder::class,
            VehiculoTableSeeder::class,
            ChoferTableSeeder::class,
            RutaTableSeeder::class,
            EstadoConfirmacionTableSeeder::class,
            ViajeTableSeeder::class,
            TipoPagoTableSeeder::class,
            ClienteViajeTableSeeder::class,
            ChoferViajeTableSeeder::class,
        ]);
    }
}
