<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sede::create(['nombre' => 'Miravalle', 'ubicacion' => 'Paganini, Miravalle, 44990 Guadalajara, Jal.','imagen' => '/storage/sedes/Miravalle.jpg']);
        Sede::create(['nombre' => 'Cerro Del Cuatro', 'ubicacion' => 'Fovissste Miravalle, 45610 San Pedro Tlaquepaque, Jal.','imagen' => '/storage/sedes/Cerro_Del_4.jpeg']);
        Sede::create(['nombre' => 'Beluma', 'ubicacion' => 'Puerto Mazatlan 78, San Pedrito, 45625 San Pedro Tlaquepaque, Jal.','imagen' => '/storage/sedes/Beluma.jpg']);
        Sede::create(['nombre' => 'Valle Real', 'ubicacion' => 'Paseo San Arturo Norte 2000, Valle Real, 45019 Guadalajara, Jal.','imagen' => '/storage/sedes/Valle_Real.jpg']);
        Sede::create(['nombre' => 'Constancio Hernández', 'ubicacion' => 'Prol. Gigantes 102B, Loma Bonita II, 45416 Tonalá, Jal.','imagen' => '/storage/sedes/Constancio_Hernandez.jpg']);
        Sede::create(['nombre' => 'Puerta De Hierro', 'ubicacion' => 'Av. Paseo Royal Country 4692, Puerta de Hierro, 45116 Zapopan, Jal.','imagen' => '/storage/sedes/Puerta_Hierro.jpg']);
        Sede::create(['nombre' => 'Tucson', 'ubicacion' => 'Calle Alfonso Cravioto 2315B, Jardines Alcalde, 44298 Guadalajara, Jal.','imagen' => '/storage/sedes/Tucson.jpg']);
        Sede::create(['nombre' => 'Paseos Del Sol', 'ubicacion' => 'Calle Tomas Balcázar Col, Paseos del Sol, 45079 Zapopan, Jal.','imagen' => '/storage/sedes/Paseos_Del_Sol.jpg']);
        Sede::create(['nombre' => 'El Dean', 'ubicacion' => 'Fruto Romero 2496, El Dean, 44440 Guadalajara, Jal.','imagen' => '/storage/sedes/El_Dean.jpg']);
        Sede::create(['nombre' => 'La Rioja', 'ubicacion' => 'Abasolo 316, 45600 Santa Anita, Jal.','imagen' => '/storage/sedes/La_Rioja.jpg']);
        Sede::create(['nombre' => 'Maracaná', 'ubicacion' => 'Camino Real a Agua Amarilla 2051, 45610 San Pedro Tlaquepaque, Jal.','imagen' => '/storage/sedes/Maracana.jpg']);
        Sede::create(['nombre' => 'El Briseño', 'ubicacion' => 'Tlalpan, con Mexicas S/N, El Briseño, 45236 Zapopan, Jal.','imagen' => '/storage/sedes/El_Briseño.jpg']);
        Sede::create(['nombre' => 'López Mateos', 'ubicacion' => 'Av. Cristóbal Colón 2189, Colón Industrial, 44930 Guadalajara, Jal.','imagen' => '/storage/sedes/Lopez_Mateos.jpg']);
        Sede::create(['nombre' => 'Bosque Escondido', 'ubicacion' => 'Anillo Perif. Nte. Manuel Gómez Morín 1467, Cantera Morada, La Palmita, 45150 Zapopan, Jal.','imagen' => '/storage/sedes/Bosque_Escondido.jpg']);
        Sede::create(['nombre' => 'Valle Imperial', 'ubicacion' => 'Antiguo Camino a Copalita, Marcelino García Barragán, 45053 Nuevo México, Jal.','imagen' => '/storage/sedes/Valle_Imperial.jpg']);
        Sede::create(['nombre' => 'Ejidal', 'ubicacion' => 'Calle Piedrera 13, Las Juntitas, 45590 San Pedro Tlaquepaque, Jal.','imagen' => '/storage/sedes/Ejidal.jpg']);

        \App\Models\Sede::factory(14)->create();
    }
}
