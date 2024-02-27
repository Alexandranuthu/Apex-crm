<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::all();
        //By calling truncate() on the posts table before the loop, you'll ensure that all previously seeded posts are removed before inserting new ones. 
        // DB::table('tasks')->truncate();

        foreach($users as $user){
            //this loops generates 1 random post for each user
            for ($i = 0; $i < 2; $i++) {
                DB::table('tasks')->insert([
                    'name' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'completed' => $faker->boolean,
                    'user_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
