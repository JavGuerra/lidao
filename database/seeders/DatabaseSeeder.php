<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Datos del administrador
        $this->call(AdminSeeder::class);

        // Configuración general del entorno de la aplicación
        $this->call(ConfigurationSeeder::class);

        // Poblar la BBDD con usuarios de prueba al azar en desarrollo
        if (config('app.env') != 'production') {
            \App\Models\User::factory(10)->create();
            \App\Models\Nia::factory(10)->create();
        }
    }
}
