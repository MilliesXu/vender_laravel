<?php

namespace Tests\Feature;

use App\Models\Material;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MaterialTagTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Store Tags TO Material As Guest Get Redirected
     * @return void
     */
    public function test_store_tags_to_material_as_guest(): void
    {
        $response = $this->post('/material_tag/1');

        $response->assertRedirect('user/login');
    }

    /**
     * Test Store Tag Material Not Found
     * @return void
     */
    public function test_store_tag_material_not_found(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/material_tag/1');

        $response->assertStatus(404);
    }

    /**
     * Test Store Tag Material Success
     * @return void
     */
    public function test_store_tag_material_success(): void
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $tag1 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $tag2 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->post("/material_tag/$material->id", [
            'tag_ids' => "$tag1->id,$tag2->id"
        ]);

        $response->assertRedirect("/material/$material->id");
        $response->assertSessionHas('success', 'Successfully add new tags');
    }
}
