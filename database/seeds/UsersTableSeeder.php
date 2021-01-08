<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Traits\UsesUuid;

use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        $users = [];
        $faker = Faker\Factory::create('id_ID');
        for($i=0; $i<5; $i++) {
            $avatar_path = 'public/photos/users';
            // $avatar_fullpath = $faker->image( $avatar_path, 200, 250, 'people', true, true, 'pepole');
            $avatar_fullpath = $faker->image($avatar_path, 600, 400, 'people', true, 'Faker', true);
            $avatar_image = explode("\\", $avatar_fullpath);
            $users[$i] = [
                'id'            => Str::uuid(),
                'name'          => $faker->name,
                'email'         => $faker->unique()->safeEmail,
                'password'      => bcrypt('12345678'),
                'created_at'    => \Carbon\Carbon::now(),
                'role_id'       => '59446576-5b56-4bb5-a1f8-1eecddc083e3',
                'photo_profile' => 'photos/user/photo-profile'.$avatar_image[1]
            ];

            // dd($avatar_path);
            // dd($avatar_fullpath);
            // dd($avatar_image);
            // dd($users);
        }
        DB::table('users')->insert($users);
    }
}
