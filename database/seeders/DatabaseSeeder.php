<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\CommunityCategory;
use App\Models\Post;
use App\Models\PostComment;
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
        $users = User::factory()->count(50)->create();
        for ($x = 0; $x <= 20; $x++) {
            $communities = Community::factory()
                ->count(rand(1, 5))
                ->for(CommunityCategory::factory())
                ->create();
        }
        for ($x = 0; $x <= 20; $x++) {
            $posts = Post::factory()
                ->count(rand(1, 5))
                ->create();
        }
        $userCount = User::count();
        $postCount = Post::count();
        $postComment = PostComment::factory()->count(500)->create();
//        $postComments = PostComment::factory()
//            ->count(300)
//            ->forUser(1)->forPost(1)
//            ->create();
    }
}
