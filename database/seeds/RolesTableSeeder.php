<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::insert([
            [
                'id' => Str::uuid(),
                'name' => 'admin',
            ], 
            [
                'id' => Str::uuid(), 
                'name' => 'user'
            ],
        ]);
    }
}
