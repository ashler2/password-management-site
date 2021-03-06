<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\PasswordSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
           $this->call([
            RolesSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PasswordSeeder::class
        ]);
    }
}
