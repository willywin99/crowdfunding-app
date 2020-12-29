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

        for($i=1; $i<=50; $i++) {
            Blog::insert([
                'id' => Str::uuid(),
                'title' => $faker->jobTitle,
                'description' => $faker->text($maxNbChars = 191)
            ]);
        }
    }
}
