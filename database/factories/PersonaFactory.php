<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $tiempo = time();
        $url = 'https://loremflickr.com/400/400/people';
        $img = 'public/uploads/personas/'.$tiempo.'.jpg';
        $route = '/uploads/personas/'.$tiempo.'.jpg';
        file_put_contents($img, file_get_contents($url));
        
        $helperRol = $this->faker->numberBetween(1,3);
        $rol = 'Jugador';
        switch($helperRol){
            case 1:
                $rol = 'Jugador';
            break;
            case 2:
                $rol = 'Director';
            break;
            case 3:
                $rol = 'Auxiliar';
            break;
        }

        $helperSex =$this->faker->numberBetween(1,2);
        $sex = 'F';
        switch($helperSex){
            case 1:
                $sex = 'M';
            break;
            case 2:
                $sex = 'F';
            break;
        }

        return [
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->randomNumber(2,true),
            'sexo' => $sex,
            'rol' => $rol,
            'imagen' => $route,
            'id_equipo' => $this->faker->numberBetween(1,22),
        ];
    }
}
