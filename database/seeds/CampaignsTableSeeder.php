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
                'description' => $faker->text($maxNbChars = 191)
            ]);
        }

    }
}
