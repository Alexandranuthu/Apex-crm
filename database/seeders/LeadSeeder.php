<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::all();

        // Number of records you want to keep
        $recordsToKeep = 350;

        // Calculate the number of records to delete
        $recordsToDelete = DB::table('leads')->count() - $recordsToKeep;

        // Delete records in batches to avoid foreign key constraint violation
        while ($recordsToDelete > 0) {
            // Delete records in a batch
            $batchSize = min($recordsToDelete, 1000);
            DB::table('leads')->orderBy('id')->limit($batchSize)->delete();
            $recordsToDelete -= $batchSize;
        }

        // Insert new records
        foreach ($users as $user) {
            // Generate new leads for each user
            for ($i = 0; $i < 1; $i++) {
                DB::table('leads')->insert([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'phone' => $faker->phoneNumber,
                    'message' => $faker->text,
                    'user_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
