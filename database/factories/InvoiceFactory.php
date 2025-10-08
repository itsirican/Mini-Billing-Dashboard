<?php 

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class InvoiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'amount' => $this->faker->randomFloat(2, 50, 5000),
            'status' => $this->faker->randomElement(['unpaid', 'pending', 'paid']),
            'customer_id' => Customer::inRandomOrder()->first()?->id ?? Customer::factory(),
        ];
    }
}