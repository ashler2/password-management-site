<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'          =>  'user-create',
            'screen_name'   =>  'Create User'
        ]);
        Permission::create([
            'name'          =>  'user-read',
            'screen_name'   =>  'read User'
        ]);
        Permission::create([
            'name'          =>  'user-update',
            'screen_name'   =>  'Update User'
        ]);
        Permission::create([
            'name'          =>  'user-delete',
            'screen_name'   =>  'Delete User'
        ]);
        Permission::create([
            'name'          =>  'assign-role',
            'screen_name'   =>  'Assign Role'
        ]);
    }
}
