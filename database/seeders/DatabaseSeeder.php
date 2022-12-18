<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Phrase;
use App\Models\Thread;
use App\Models\User;
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
        User::factory(10)->create();

        User::factory()->create([
            'email' => 'test@gmail.com',
            'admin' => 1
        ]);

        Thread::factory(10)->create();
        Comment::factory(100)->create();
        Like::factory(500)->create();

        Phrase::factory()->create([
            'content' => 'Keep calm and watch anime'
        ]);
    }
}
