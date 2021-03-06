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
        
        $imagen_name = $this->faker->unique()->word();
        $url = 'https://source.unsplash.com/500x500/?pet';
        $url_aux = $this->faker->numberBetween(1,6);
        switch($url_aux){
            case 1:
                $url = 'https://loremflickr.com/400/400/animales';
            break;
            case 2:
                $url = 'https://source.unsplash.com/500x500/?pet';
            break;
            case 3:
                $url = 'https://source.unsplash.com/500x500/?mascota';
            break;
            case 4:
                $url = 'https://source.unsplash.com/500x500/?animal';
            break;
            case 5:
                $url = 'https://source.unsplash.com/500x500/?animals';
            break;
            case 6:
                $url = 'https://source.unsplash.com/500x500/?animales';
            break;
            case 7:
                $url = 'https://source.unsplash.com/500x500/?fish';
            break;
        }
        $img = 'public/storage/equipos/'.$imagen_name.'.jpg';
        $route = '/storage/equipos/'.$imagen_name.'.jpg';
        file_put_contents($img, file_get_contents($url));

        return [
            'nombre' => $this->faker->city(),
            'fundacion' => $this->faker->date(),
            'imagen' => $route,
            'sede_id' => $this->faker->numberBetween(1,Sede::count()),
        ];
    }

    
}
