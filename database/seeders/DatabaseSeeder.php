<?php

namespace Database\Seeders;

use App\Models\PersonaEncuentro;
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
        $this->call([SedeSeeder::class,EquipoSeeder::class,PersonaSeeder::class,EncuentroSeeder::class,]);
    }
}
