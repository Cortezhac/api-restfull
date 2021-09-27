<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    Use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_registerUserSuccess()
    {
        $response = $this->post('/api/auth/register', [
            'name' => 'testing user',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);
        
        $response->assertStatus(201);
        $response->assertJson(
            ['message'=> 'User created']
        );
    }
}
