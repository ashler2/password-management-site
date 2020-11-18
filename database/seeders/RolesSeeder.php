<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create([
            'name'  =>  'admin',
            'screen_name'   =>  'Admin'
        ]);
        Role::create([
            'name'  =>  'user',
            'screen_name'   =>  'User'
        ]);
    }
}
