<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::factory()->count(300)->has(Post::factory()->count(3), 'posts')->create();


        User::factory(100)->has(
            Post::factory(random_int(5,10))
                ->has(Comment::factory(random_int(2,3)))
        )->create();
    }
}


