<?php

namespace Database\Factories;

use App\Models\Encuentro;
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

        $equipo_local_id = $this->faker->numberBetween(1,20);

        $equipo_visitante_id = $equipo_local_id;

        while($equipo_visitante_id == $equipo_local_id)
            $equipo_visitante_id = $this->faker->numberBetween(1,20);

        $sede_id = $this->faker->numberBetween(1,16);
        $goles_local = $this->faker->numberBetween(0,5);
        $goles_visitante = $this->faker->numberBetween(0,5);

        return [
            'equipo_local_id' => $equipo_local_id,
            'equipo_visitante_id' => $equipo_visitante_id,
            'sede_id' => $sede_id,
            'observaciones' => $this->faker->paragraph(),
            'fecha_hora' => $this->faker->dateTimeBetween('-1 week', '+5 week'),
            'resultado' => $goles_local . ' - ' . $goles_visitante,

        ];
    }
}
