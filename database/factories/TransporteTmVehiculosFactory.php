<?php

namespace Database\Factories;

use App\Models\Transportes\TransporteTmVehiculos;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransporteTmVehiculosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransporteTmVehiculos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descripcion' => $this->faker->name,
            'codigo' => $this->faker->numerify('####'),
            'color' => $this->faker->colorName,
        ];
    }
}
