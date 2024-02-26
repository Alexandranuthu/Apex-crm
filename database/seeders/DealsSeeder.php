<?php

namespace Database\Seeders;
use App\Models\Deals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i  < 15; $i++) {
            DB::table('Deals')->insert([
                'name' => $faker->sentence,
                'description' => $faker->paragraph,
                'owner' => $faker->name,
                'amount' => $faker->randomNumber(5),
                'status' => $faker->randomNumber(1,5),
                'start_date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'close_date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
