<?php

namespace Database\Factories;

use App\Models\Globales\GlobalTrDepartamentos;
use App\Models\Globales\GlobalTrMunicipios;
use Illuminate\Database\Eloquent\Factories\Factory;

class GlobalTrMunicipiosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GlobalTrMunicipios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'global_tr_departamentos_id' => GlobalTrDepartamentos::factory(),
            'descripcion' => $this->faker->name,
            'sigla' => $this->faker->asciify('*****'),
            'codigo' => $this->faker->numerify('####'),
        ];
    }
}
