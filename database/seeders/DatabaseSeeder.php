<?php

namespace Database\Seeders;

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
        $this->call(ConfigurationSeeder::class);

        // TODO deshabilitar en producción
        \App\Models\User::factory(10)->create();
        \App\Models\Nia::factory(10)->create();
    }
}
