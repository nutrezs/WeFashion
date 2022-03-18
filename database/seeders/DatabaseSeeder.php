<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ProductTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // appel des différentes seeders
         $this->call(UserTableSeeder::class);
        //$this->call(ProductTableSeeder::class);
    }
}
