<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Category::create([
        //     'name' => 'Sport'
        // ]);
        // \App\Models\Category::create([
        //     'name' => 'Culture'
        // ]);

        Review::create([
            'name' => 'test user1',
            'content' => 'good site'
        ]);
        Review::create([
            'name' => 'test user2',
            'content' => 'excellent site'
        ]);
    }
}
