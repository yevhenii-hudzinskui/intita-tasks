<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $userIds = DB::table('users')->pluck('id');

        $i = 100;

        while ($i--){
            DB::table('tasks')->insert([
                'user_id' => $userIds->random(),
                'name' => fake()->word(),
                'description' => fake()->text(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
