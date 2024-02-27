<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name'=>$this->faker->name,
           'email'=>$this->faker->unique()->safeEmail,
           'phone' =>  '+254'. $this->faker->phoneNumber,
           'message'=>$this->faker->message(50),
           'user_id' => User::factory()->create()->id,
        ];
    }
}
