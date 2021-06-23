<?php

namespace Database\Factories;

use App\Models\Sede;
use Illuminate\Database\Eloquent\Factories\Factory;

class SedeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sede::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imagen_name = $this->faker->unique()->word();
        $url = 'https://source.unsplash.com/1600x900/?stadium';
        $url_aux = $this->faker->numberBetween(1,2);
        switch($url_aux){
            case 1:
                $url = 'https://source.unsplash.com/1200x900/?stadium';
            break;
            case 2:
                $url = 'https://source.unsplash.com/1200x900/?estadio';
            break;
            case 3:
                $url = 'https://source.unsplash.com/1200x900/?field';
            break;
            case 4:
                $url = 'https://source.unsplash.com/1200x900/?soccer';
            break;
            case 5:
                $url = 'https://source.unsplash.com/1200x900/?futbol';
            break;
        }
        $img = 'public/storage/sedes/'.$imagen_name.'.jpg';
        $route = '/storage/sedes/'.$imagen_name.'.jpg';
        file_put_contents($img, file_get_contents($url));

        return [
            'nombre' => $this->faker->streetName(),
            'ubicacion' => $this->faker->address(),
            'imagen' => $route,
        ];
    }
}
