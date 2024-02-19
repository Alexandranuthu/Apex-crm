<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Faker\Factory as Faker;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch all organization IDs from the 'organizations' table
        $organisation_ids = DB::table('Organisation')->pluck('id');

        // Loop 15 times to insert 15 fake contacts into the database
        for ($i = 0; $i < 15; $i++) {
            DB::table('Contacts')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail, // Corrected syntax
                'phone' => $faker->phoneNumber,
                'job_title' => $faker->jobTitle,
                'organisation_id' => $faker->randomElement($organisation_ids), // Corrected variable name
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
