<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Equipo::factory(22)->create();
    }
}
