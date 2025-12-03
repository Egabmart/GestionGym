<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // Crear Roles
    \App\Models\Role::create(['nombre_rol' => 'Administrador']);
    \App\Models\Role::create(['nombre_rol' => 'Entrenador']);
    \App\Models\Role::create(['nombre_rol' => 'Miembro']);

    // Crear Tipos de Membresía
    \App\Models\TipoMembresia::create(['nombre_membresia' => 'Mensual', 'duracion_dias' => 30, 'precio' => 30.00]);
    \App\Models\TipoMembresia::create(['nombre_membresia' => 'Anual', 'duracion_dias' => 365, 'precio' => 300.00]);

    // Crear Usuario Admin de prueba
    \App\Models\User::factory()->create([
        'name' => 'Admin User',
        'email' => 'admin@gym.com',
        'password' => bcrypt('password'),
        'id_rol' => 1 // Asumiendo que 1 es Admin
    ]);
    
    // Crear Clases de prueba
    \App\Models\Clase::create([
        'nombre_clase' => 'Yoga Matutino',
        'horario' => now()->addDay()->setHour(8),
        'capacidad_maxima' => 20
    ]);
    
    }
}
