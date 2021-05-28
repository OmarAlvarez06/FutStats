<?php

namespace Database\Factories;

use App\Models\Equipo;
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
        $img = 'public/uploads/equipos/'.$tiempo.'.jpg';
        $route = '/uploads/equipos/'.$tiempo.'.jpg';
        file_put_contents($img, file_get_contents($url));

        return [
            'nombre' => $this->faker->word(),
            'fecha_registro' => $this->faker->dateTimeBetween('-10 week', '+10 week'),
            'imagen' => $route,
            'activo' => 1,
        ];
    }

    
}
