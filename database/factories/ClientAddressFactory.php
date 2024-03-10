<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientAddress>
 */
class ClientAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'address' => $this->faker->streetAddress(),
			'complement' => $this->faker->realTextBetween(0, 30),
			'state' => $this->faker->text(2),
			'city' => $this->faker->realTextBetween(5, 10),
			'zip_code' => $this->faker->numerify('#####'),
        ];
    }
}
