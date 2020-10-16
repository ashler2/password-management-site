<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_registration()
    {
        // $this->withoutMiddleware();
        $response = $this->get('/register');
        $response->assertStatus(200);
        $post = $this->post('/register',['name' =>  'test', 'email' =>  'test@test.com', "password" =>  'Password', "password_confirmation" => 'Password']);
        $post->assertStatus(302);
        $this->assertDatabaseHas('users',
        ['email' => 'test@test.com']);
    }
}
