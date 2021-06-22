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
        $tiempo = time();
        $url = 'https://loremflickr.com/400/400/stadium';
        $url_aux = $this->faker->numberBetween(1,2);
        switch($url_aux){
            case 1:
                $url = 'https://loremflickr.com/400/400/stadium';
            break;
            case 2:
                $url = 'https://loremflickr.com/400/400/estadio';
            break;
        }
        $img = 'public/storage/sedes/'.$tiempo.'.jpg';
        $route = '/storage/sedes/'.$tiempo.'.jpg';
        file_put_contents($img, file_get_contents($url));

        return [
            'nombre' => $this->faker->streetName(),
            'ubicacion' => $this->faker->address(),
            'imagen' => $route,
        ];
    }
}
