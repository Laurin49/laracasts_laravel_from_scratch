<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->create_user_post_category_manuell();
        $this->create_user_post_category_with_factory();

    }

    private function create_user_post_category_with_factory() {
        $user = User::factory()->create([
           'name' => "S. Schonlau"
        ]);
        Post::factory(10)->create([
            'user_id' => $user->id
        ]);
    }

    private function create_user_post_category_manuell() {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();
        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $hobby = Category::create([
            'name' => 'Hobbies',
            'slug' => 'hobbies'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal->id,
            'title' => 'My Personal Post',
            'slug' => 'my-personal-post',
            'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
            'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore tenetur eum modi provident facere voluptatibus eligendi excepturi quae distinctio sint facilis veritatis, voluptate ad ut repudiandae cum temporibus, corporis animi? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore tenetur eum modi provident facere voluptatibus eligendi excepturi quae distinctio sint facilis veritatis, voluptate ad ut repudiandae cum temporibus, corporis animi?</p>'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
            'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore tenetur eum modi provident facere voluptatibus eligendi excepturi quae distinctio sint facilis veritatis, voluptate ad ut repudiandae cum temporibus, corporis animi? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore tenetur eum modi provident facere voluptatibus eligendi excepturi quae distinctio sint facilis veritatis, voluptate ad ut repudiandae cum temporibus, corporis animi?</p>'
        ]);
        Post::create([
            'user_id' => $user->id,
            'category_id' => $hobby->id,
            'title' => 'My Hobbies Post',
            'slug' => 'my-hobby-post',
            'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
            'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore tenetur eum modi provident facere voluptatibus eligendi excepturi quae distinctio sint facilis veritatis, voluptate ad ut repudiandae cum temporibus, corporis animi? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore tenetur eum modi provident facere voluptatibus eligendi excepturi quae distinctio sint facilis veritatis, voluptate ad ut repudiandae cum temporibus, corporis animi?</p>'
        ]);
    }
}
