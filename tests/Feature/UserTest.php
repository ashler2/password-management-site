<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $post = $this->post('/register',['name' =>  'test', 'email' =>  'password']);
        $post->assertStatus(200);
    }
}
