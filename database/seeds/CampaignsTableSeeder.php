<?php

use App\Campaign;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use Faker\Factory as Faker;

class CampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');

        for($i=1; $i<=50; $i++) {
            Campaign::insert([
                'id' => Str::uuid(),
                'title' => $faker->company,
                'description' => $faker->text($maxNbChars = 191),
                'image' => $faker->imageUrl($width = 600, $height = 400, 'cats', true, 'Faker', true),
                'address' => $faker->address,
                'required' => $faker->numberBetween($min = 5000000, $max = 1000000000),
                'collected' => $faker->numberBetween($min = 0, $max = 1000000000)
            ]);
        }

    }
}
