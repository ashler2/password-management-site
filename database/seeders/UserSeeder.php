<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name'      =>  'Admin',
            'email'     =>  'admin@admin.com',
            'password' =>   Hash::make('password')
        ]);
        User::create([
            'name'      =>  'User',
            'email'     =>  'user@user.com',
            'password' =>   Hash::make('password')
        ]);
        
    }
}
