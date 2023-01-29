<?php

namespace Tests\Feature;

use App\Models\Material;
use App\Models\MaterialTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
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
        /** @var User $user */
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
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Material $material */
        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var Tag $tag1 */
        $tag1 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var Tag $tag2 */
        $tag2 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->post("/material_tag/$material->id", [
            'tag_ids' => "$tag1->id,$tag2->id"
        ]);

        $response->assertRedirect("/material/$material->id");
        $response->assertSessionHas('success', 'Successfully add new tags');
    }

    /**
     * Test Delete MaterialTag As Guest Get Redirected
     * @return void
     */
    public function test_delete_material_tag_as_guest(): void
    {
        $response = $this->delete("/material_tag/2/1");
        $response->assertRedirect('/user/login');
    }

    /**
     * Test Delete MaterialTag But Not Found
     * @return void
     */
    public function test_delete_material_tag_not_found(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete("/material_tag/2/1");
        $response->assertStatus(404);
    }

    public function test_delete_material_tag_success(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Material $material */
        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var Tag $tag */
        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var MaterialTag $material_tag */
        $material_tag = MaterialTag::factory()->create([
            'material_id' => $material->id,
            'tag_id' => $tag->id,
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->delete("/material_tag/$material->id/$material_tag->id");
        $response->assertRedirect("/material/$material->id");
        $response->assertSessionHas('success', "Successfully delete tag from $material->name");
    }
}
