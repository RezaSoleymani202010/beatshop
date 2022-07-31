<?php

namespace Database\Seeders;

use App\Models\Beat;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public $limit=10;
    public function run()
    {
//        $this->call([CategorySeeder::class]);
//        $this->call([BeatSeeder::class]);
//$user=User::factory()->count(10)->create();
//$category=Category::factory()->create();
//        $beats = Beat::factory()->count(10)
//            ->for($category)
//            ->create();
//        $comments=Comment::factory()->count(10)->for($user,$beats)->create();
        for ($i=0;$i<10;$i++) {
            $user = User::factory()->create();
            $category = Category::factory()->create();
            $beat = Beat::factory()->for($category)->create();
            $comment = Comment::factory()->for($user)->for($beat)->create();
        }

    }
}
