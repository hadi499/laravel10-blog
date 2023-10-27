<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Hadi Purnomo',
            'username' => 'hadi',
            'email' => 'hadi@gmail.com',
            'password' => bcrypt('password')
        ]);

        Category::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);

        Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);

        Category::create([
            'name' => 'Ekonomi Dunia',
            'slug' => 'ekonomi-dunia'
        ]);
    }
}
