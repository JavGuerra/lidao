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
            ['key' => 'paginate',           'value' => 5],
            ['key' => 'activeSchoolyearId', 'value' => ''],
        ]);
    }
}
