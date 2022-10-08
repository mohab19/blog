<?php

namespace Tests\Unit;

use App\Domains\Users\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * Tests the get posts api requires authentication.
     *
     * @return void
     */
    public function test_get_posts_api_authenticate()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/api/posts/get');

        $response->assertStatus(401);
    }

    /**
     * Test create post api validates the input.
     *
     * @return void
     */
    public function test_create_post_verify_data()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('/api/posts/create');

        $response->assertStatus(422);
    }
}
