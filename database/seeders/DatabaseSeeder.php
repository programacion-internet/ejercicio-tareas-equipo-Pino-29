<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tarea;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'password'=> bcrypt('password'),
        // ]);

        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password'=> bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password'=> bcrypt('password'),
        ]);
        
        Tarea::factory()->count(count: 30)->create();
    }
}
