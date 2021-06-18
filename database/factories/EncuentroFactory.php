<?php

namespace Database\Factories;

use App\Models\Encuentro;
use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EncuentroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Encuentro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $equipo_local_id = $this->faker->numberBetween(1,Equipo::count());

        $equipo_visitante_id = $equipo_local_id;
        while($equipo_visitante_id == $equipo_local_id)
            $equipo_visitante_id = $this->faker->numberBetween(1,Equipo::count());

        $goles_local = $this->faker->numberBetween(0,5);
        $goles_visitante = $this->faker->numberBetween(0,5);

        return [
            'equipo_local_id' => $equipo_local_id,
            'equipo_visitante_id' => $equipo_visitante_id,
            'fecha_hora' => $this->faker->dateTimeBetween('-1 week', '+5 week'),
            'goles_local' => $goles_local,
            'goles_visitante' => $goles_visitante,

        ];
    }
}
