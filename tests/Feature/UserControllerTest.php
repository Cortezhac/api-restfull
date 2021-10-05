<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * Get user inforamtion
     *
     * @return void
     */
    public function me()
    {
        $response = $this->get('/api/users/me');

        $response->assertStatus(200);
    }
}
