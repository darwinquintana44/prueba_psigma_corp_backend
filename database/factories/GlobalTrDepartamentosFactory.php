<?php

namespace Database\Factories;

use App\Models\Globales\GlobalTrDepartamentos;
use App\Models\Globales\GlobalTrPaises;
use Illuminate\Database\Eloquent\Factories\Factory;

class GlobalTrDepartamentosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GlobalTrDepartamentos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'global_tr_paises_id' => GlobalTrPaises::factory(),
            'descripcion' => $this->faker->name,
            'sigla' => $this->faker->asciify('*****'),
            'codigo' => $this->faker->numerify('####'),
        ];
    }
}
