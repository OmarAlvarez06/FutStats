<?php

namespace Database\Factories;

use App\Models\Persona;
use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

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
        $faker = Faker::create('es_ES');
        $tiempo = time();

        $url = 'https://loremflickr.com/400/400/people';
        $url_aux = $faker->numberBetween(1,9);
        switch($url_aux){
            case 1:
                $url = 'https://loremflickr.com/400/400/people';
            break;
            case 2:
                $url = 'https://loremflickr.com/400/400/gente';
            break;
            case 3:
                $url = 'https://loremflickr.com/400/400/persona';
            break;
            case 4:
                $url = 'https://loremflickr.com/400/400/teenager';
            break;
            case 5:
                $url = 'https://loremflickr.com/400/400/man';
            break;
            case 6:
                $url = 'https://loremflickr.com/400/400/hombre';
            break;
            case 7:
                $url = 'https://loremflickr.com/400/400/woman';
            break;
            case 8:
                $url = 'https://loremflickr.com/400/400/mujer';
            break;
            case 9:
                $url = 'https://loremflickr.com/400/400/adolescente';
            break;

        }

        $img = 'public/storage/personas/'.$tiempo.'.jpg';
        $route = '/storage/personas/'.$tiempo.'.jpg';
        file_put_contents($img, file_get_contents($url));
        
        $helperRol = $faker->numberBetween(1,3);
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

        $helperSex =$faker->numberBetween(1,3);
        $sex = 'F';
        switch($helperSex){
            case 1:
                $sex = 'M';
            break;
            case 2:
                $sex = 'F';
            break;
            case 3:
                $sex = 'O';
            break;
        }

        $genero = ($sex == 'M') ? 'male' : 'female';
        return [
            'nombre' => $faker->name($genero),
            'edad' => $faker->randomNumber(2,true),
            'sexo' => $sex,
            'rol' => $rol,
            'imagen' => $route,
            'equipo_id' => $faker->numberBetween(1,Equipo::count()),
        ];
    }
}
