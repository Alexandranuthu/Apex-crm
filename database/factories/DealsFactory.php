<?php

namespace Database\Factories;
use \App\Models\Deals;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deals>
 */
class DealsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'name'=>$this->faker->sentence,
          'description'=>$this->faker->paragraph,
          'owner'=>$this->faker->name,
          'amount'=>$this->faker->randomFloat(2, 100, 10000),
          'status'=>$this->faker->randomElement(['Prospecting', 'Qualification', 'Negotiation', 'Closed-Won', 'Closed-Lost']),
          'start_date'=>$this->faker->dateTimeBetween('-1 year', 'now'),
          'close_date'=>$this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
