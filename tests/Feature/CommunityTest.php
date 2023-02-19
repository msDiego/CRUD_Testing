<?php

namespace Tests\Feature;

use App\Models\Community;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CommunityTest extends TestCase
{

    public function test_can_fetch_all_communities()
    {

        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->get('/api/communities');
        $response->assertStatus(200);

    }

    public function test_can_fetch_single_community()
    {

        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->get('/api/communities/1');
        $response->assertStatus(200);

    }

    public function test_can_create_community()
    {

        $this->withoutExceptionHandling();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $data = [
            'titulo' => 'test'
        ];

        $response = $this->postJson('api/communities', $data, ['Content-Type' => 'application/vnd.api+json']);
        $response->assertStatus(201);
    }

    public function test_guests_cannot_create_communities()
    {

        $data = [
            'titulo' => 'test'
        ];

        $response = $this->postJson('api/communities', $data, ['Content-Type' => 'application/vnd.api+json']);
        $response->assertUnauthorized();

    }

    public function test_cannot_create_community_without_name(){


        $this->withExceptionHandling();

        Sanctum::actingAs(
            User::factory()->create()
        );

        $data = [
            'titulo' => ''
        ];

        $response = $this->postJson('api/communities', $data, ['Content-Type' => 'application/vnd.api+json']);
        $response->assertStatus(500);

    }

    public function test_can_update_communities()
    {

        Sanctum::actingAs(
            User::factory()->create()
        );

        $comunidad = Community::factory()->create();

        $data = [
            'titulo' => 'test'
        ];

        $response = $this->patchJson(route('communities.update', $comunidad), $data,
            ['Content-Type' => 'application/vnd.api+json']);

        $response->assertStatus(200);

    }

    public function test_can_delete_community(){

        Sanctum::actingAs(
            User::factory()->create()
        );

        $comunidad = Community::factory()->create();

        $response = $this->deleteJson(route('communities.destroy', $comunidad));
        $response->assertNoContent();
        $this->assertSoftDeleted($comunidad);

    }

    public function test_can_return_json_api_error_when_not_found(){

        Sanctum::actingAs(
            User::factory()->create()
        );

        $response = $this->getJson(route('communities.show', 999));

        $response->assertJsonStructure();
    }
}
