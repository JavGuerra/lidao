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
                'email' => 'admin@email.es',
                'email_verified_at' => null,
                'role' => 0,
                'locale' => 'es',
                'password' => '$2y$10$CiK4KgbiamkMKRqIj1sDlOTlr9z82zC5trlc/IJ8I8ls2zXiN5Vjy',
                'two_factor_secret' => null,
                'two_factor_recovery_codes' => null,
                'remember_token' => null,
                'profile_photo_path' => null,
                'status' => 1,
                'last_login_ip' => null,
                'last_login_at' => null,
                'created_at' => null,
                'updated_at' => null,
                'deactivated_at' => null
            ]
        ]);
    }
}
