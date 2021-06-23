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

        $imagen_name = $this->faker->unique()->word();

        $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?woman' : 'https://source.unsplash.com/500x500/?man';
        $url_aux = $this->faker->numberBetween(1,7);
        switch($url_aux){
            case 1:
                $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?woman' : 'https://source.unsplash.com/500x500/?man';
            break;
            case 2:
                $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?mujer' : 'https://source.unsplash.com/500x500/?hombre';
            break;
            case 3:
                $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?mulher' : 'https://source.unsplash.com/500x500/?homem';
            break;
            case 4:
                $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?femme' : 'https://source.unsplash.com/500x500/?homme';
            break;
            case 5:
                $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?ragazza' : 'https://source.unsplash.com/500x500/?uomo';
            break;
            case 6:
                $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?muchacha' : 'https://source.unsplash.com/500x500/?muchacho';
            break;
            case 7:
                $url = ($genero == 'female')? 'https://source.unsplash.com/500x500/?girl' : 'https://source.unsplash.com/500x500/?boy';
            break;
        }

        $img = 'public/storage/personas/'.$imagen_name.'.jpg';
        $route = '/storage/personas/'.$imagen_name.'.jpg';
        file_put_contents($img, file_get_contents($url));
    
        return [
            'nombre' => $faker->name($genero),
            'edad' => $faker->numberBetween(18,50),
            'sexo' => $sex,
            'rol' => $rol,
            'imagen' => $route,
            'equipo_id' => $faker->numberBetween(1,Equipo::count()),
        ];
    }
}
