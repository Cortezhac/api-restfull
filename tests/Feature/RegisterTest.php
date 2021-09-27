<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    Use RefreshDatabase;
    /**
     * Register user
     *
     * @return void
     */
    public function test_registerUserSuccess()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => 'testing user',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);
        
        $response->assertStatus(201);
        $response->assertJson(
            ['message'=> 'User created']
        );
    }

    /**
     * Validation errors
     * 
     * @return void
     */
    public function test_registerUserErrorValidation(){
        $response = $this->postJson('/api/auth/register', [
        ]);

        $response->assertStatus(422);
        $response->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."]
                ]
            ]
        );
    }
}
