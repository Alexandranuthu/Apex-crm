<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating an instance of Faker
        $faker = Faker::create();

        // Loop 15 times to insert fake organisations into the database
        for ($i = 0; $i < 15; $i++) {
            // Insert a new record into the 'organisations' table
            DB::table('organisation')->insert([
                // Generating a fake company name
                'name' => $faker->company,
                // Generating a fake industry (job title)
                'industry' => $faker->jobTitle,
                // Selecting a random element from the array ['small', 'Medium', 'Large'] as the organization size
                'orgsize' => $faker->randomElement(['small', 'Medium', 'Large']),
                // Setting the created_at timestamp to the current time
                'created_at' => now(),
                // Setting the updated_at timestamp to the current time
                'updated_at' => now(),
            ]);
        }
    }
}
