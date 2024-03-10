<?php

namespace Database\Factories;

use App\Models\ClientAddress;
use App\Models\Consumer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prospection>
 */
class ProspectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'consumer_id' => Consumer::inRandomOrder()->first()->id,
			'client_address_id' => ClientAddress::inRandomOrder()->first()->id,
			'categories' => "Home",
        ];
    }
}
