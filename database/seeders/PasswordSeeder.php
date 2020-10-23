<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Password;
use Illuminate\Support\Facades\Crypt;


class PasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Password::create([
            'name'  => 'TestACCount',
            'Login' =>  'test@test.com',
            'Email' =>  'test@testEmail.com',
            "password"  =>  Crypt::encryptString('password'),
            "website"   =>  'www.google.com',
            "notes"     => 'test123',
            "category_id"   =>  1,
            'password_length'   =>  Crypt::encryptString(strlen('password'))
        ]);
    }
}
