<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EncuentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Encuentro::factory(30)->create();
    }
}
