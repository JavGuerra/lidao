<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Carga los datos del administrador en la tabla de usuarios.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'Admin',
                'email' => 'admin@correo.es',
                'email_verified_at' => null,
                'role' => 0,
                'locale' => 'es',
                'password' => '$2y$10$hBN1qRkn7iKSbAiQ3CKbPe1fYo01E..bn8Ra8NnG4iZ3qP5K5WDiy', // adminadmin
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'remember_token' => null,
                'profile_photo_path' => null,
                'status' => 1,
                'last_login_ip' => null,
                'last_login_at' => null,
                'created_at' => now(),
                'updated_at' => null,
                'deactivated_at' => null
            ]
        ]);
    }
}
