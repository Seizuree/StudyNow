<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'gender' => 'Male',
            'dob'=> '2002/12/31',
            'password' => bcrypt('testpassword'), // password
            'profile_image' => "default profile.png",
            'role' => 'Admin',
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@mail.com',
            'gender' => 'Male',
            'dob'=> '2002/12/31',
            'password' => bcrypt('testpassword'), // password
            'profile_image' => "default profile.png",
            'role' => 'Member',
            'created_at' => now(),
        ]);
    }
}
