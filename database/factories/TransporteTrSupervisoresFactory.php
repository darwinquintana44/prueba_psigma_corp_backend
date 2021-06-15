<?php

namespace Database\Factories;

use App\Models\Globales\GlobalTrMunicipios;
use App\Models\Transportes\TransporteTrSupervisores;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransporteTrSupervisoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransporteTrSupervisores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'global_tr_municipios_id' => GlobalTrMunicipios::factory(),
            'nombres' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'identificacion' => $this->faker->numerify('##########'),
            'direccion' => $this->faker->asciify('**************'),
            'telefono' => $this->faker->numerify('######'),
        ];
    }
}
