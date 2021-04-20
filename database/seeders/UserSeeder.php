<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Belew imports we need to write manually
//Inorder to call DB and Hash class
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//Terminate Code to Create a seeder class
//>>php artisan make::seeder UserSeeder
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Imran Shalabi',
            'email' => 'imran@gmail.com',
            'password' =>Hash::make('1234')
        ]);
    }

    //Terminal code to execute the seeder
    //>> php artisan db:seed --class UserSeeder
}
