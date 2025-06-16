<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'birth_date' => $this->faker->date('Y-m-d', '-18 years'),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'public_space' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
        ];
    }
}
