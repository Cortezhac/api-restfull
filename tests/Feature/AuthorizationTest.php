<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    /**
     * Login test.
     *
     * @return void
     */
    public function test_login()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/auth/login',[
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
                "message",
                "token"
            ]
        );
    }

    /**
     * Loign error test
     * @return void
     */
    public function test_loginFailed(){
        $response = $this->postJson('/api/auth/login',[
                'email' => 'notesting@gmail.com',
                'password' => 'password'
            ]
        );

        $response->assertStatus(401);
    }
}
