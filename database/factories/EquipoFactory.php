<?php

namespace Database\Factories;

use App\Models\Equipo;
use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $tiempo = time();
        $url = 'https://loremflickr.com/400/400/animal';
        $url_aux = $this->faker->numberBetween(1,7);
        switch($url_aux){
            case 1:
                $url = 'https://loremflickr.com/400/400/animales';
            break;
            case 2:
                $url = 'https://loremflickr.com/400/400/animals';
            break;
            case 3:
                $url = 'https://loremflickr.com/400/400/pet';
            break;
            case 4:
                $url = 'https://loremflickr.com/400/400/pets';
            break;
            case 5:
                $url = 'https://loremflickr.com/400/400/mascotas';
            break;
            case 6:
                $url = 'https://loremflickr.com/400/400/mascota';
            break;
            case 7:
                $url = 'https://loremflickr.com/400/400/animal';
            break;

        }
        $img = 'public/uploads/equipos/'.$tiempo.'.jpg';
        $route = '/uploads/equipos/'.$tiempo.'.jpg';
        file_put_contents($img, file_get_contents($url));

        return [
            'nombre' => $this->faker->city(),
            'fundacion' => $this->faker->date(),
            'imagen' => $route,
            'sede_id' => $this->faker->numberBetween(1,Sede::count()),
        ];
    }

    
}
