<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //création de l'administration en utilisant les seeders
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'phmmamah@gmail.com',
            'password'=>Hash::make('admin')
        ]);
    }
}
