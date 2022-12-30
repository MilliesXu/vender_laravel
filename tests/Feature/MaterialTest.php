<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MaterialTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Material Index Page As Guest Get Redirect.
     *
     * @return void
     */
    public function test_get_material_index_page_as_guest()
    {
        $response = $this->get('/material');

        $response->assertRedirect('/user/login');
    }

    public function test_get_material_index_success()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/material');

        $response->assertViewIs('material.index');
    }
}
