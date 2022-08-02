<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Carga los datos de la tabla configurations.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            ['key' => 'paginate',           'value' => 10],
            ['key' => 'activeSchoolyearId', 'value' => ''],
            ['key' => 'theme',              'value' =>'default'],
            ['key' => 'adminDoc',           'value' =>'https://lidao-docs.readthedocs.io/es/latest/administrador/index.html'],
            ['key' => 'teacherDoc',         'value' =>'https://lidao-docs.readthedocs.io/es/latest/profesor/index.html'],
            ['key' => 'studentDoc',         'value' =>'https://lidao-docs.readthedocs.io/es/latest/alumno/index.html'],
        ]);
    }
}
