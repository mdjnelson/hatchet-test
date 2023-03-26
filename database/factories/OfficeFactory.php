<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Office::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10, 10000),
            'offices' => $this->faker->numberBetween(1, 20),
            'tables' => $this->faker->numberBetween(1, 20),
            'sqm' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
