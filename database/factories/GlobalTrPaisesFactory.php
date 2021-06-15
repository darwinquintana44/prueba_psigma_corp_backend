<?php

namespace Database\Factories;

use App\Models\Globales\GlobalTrPaises;
use Illuminate\Database\Eloquent\Factories\Factory;

class GlobalTrPaisesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GlobalTrPaises::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->name,
            'sigla' => $this->faker->asciify('*****'),
            'codigo' => $this->faker->numerify('####'),
        ];
    }
}
