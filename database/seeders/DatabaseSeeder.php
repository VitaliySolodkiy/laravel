<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'majestis777@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'not admin',
            'email' => 'not-admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        \App\Models\Category::create([
            'name' => 'Sport'
        ]);
        \App\Models\Category::create([
            'name' => 'Culture'
        ]);

        Review::create([
            'name' => 'test user1',
            'content' => 'good site',
            'article_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Review::create([
            'name' => 'test user3',
            'content' => 'some new comment',
            'article_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Review::create([
            'name' => 'test user2',
            'content' => 'excellent site',
            'article_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
