<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)
            ->has(Task::factory(10))
            ->create();

        User::factory()
            ->has(Task::factory(100))
            ->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Task::factory()
            ->for(User::factory()->create())
            ->create([
                'name' => 'Test Task',
            ]);
    }
}
