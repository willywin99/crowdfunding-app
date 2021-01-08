<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Blog;

use Faker\Factory as Faker;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('en_US');

        for($i=0; $i<5; $i++) {
            Blog::insert([
                'id' => Str::uuid(),
                'title' => $faker->jobTitle,
                'description' => $faker->paragraph,
                // 'image' => $faker->image('public/storage/photos/blogs',640,480, null, false)
            ]);
        }
    }
}
