<?php

namespace Database\Factories;
use App\Models\Organisation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacts>
 */
class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'first_name'=>$this->faker->name,
            'last_name'=>$this->faker->name,
            'email'=>$this->faker->unique()->safeEmail,
            'phone' =>  '+254'. $this->faker->phoneNumber,
            'job_title'=>$this->faker->sentence(3),
            'organisation_id' => function () {
                return Organisation::factory()->create()->id;
            },
            'image' => "https://via.placeholder.com/150",
        ];
    }
}
