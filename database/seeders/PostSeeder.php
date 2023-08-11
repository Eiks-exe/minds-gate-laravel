<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()
        ->count(50)
        ->hasPosts(1)
        ->create();
    }
}
