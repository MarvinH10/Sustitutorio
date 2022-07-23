<?php

namespace Database\Factories;

use Faker\Provider\Internet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prenda>
 */
class PrendasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('es_PE');
        return [
            'nombre' => $faker->realText(30, 2),
            'fecha' => $this->faker->date(2, 3),
            'cantidad' => $this->faker->numberBetween(1, 90),
            'precio' => $this->faker->numberBetween(100, 1000),
            'tipo' => $this->$faker->randomElement(['casual', 'urbano', 'formal']),
        ];
    }
}
