<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Material;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MaterialTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Material Index Page As Guest Get Redirect.
     *
     * @return void
     */
    public function test_get_material_index_page_as_guest(): void
    {
        $response = $this->get('/material');

        $response->assertRedirect('/user/login');
    }

    public function test_get_material_index_success(): void
    {
        $user = User::factory()->create();

        /** @var Authenticatable $user */
        $response = $this->actingAs($user)->get('/material');

        $response->assertViewIs('material.index');
    }

    /**
     * Get Create Material As Guest And Get Redirected
     *
     * @return void
     */
    public function test_get_create_material_as_guest(): void
    {
        $response = $this->get('/material/create');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Get Create Material Page With Success
     *
     * @return void
     */
    public function test_get_create_material_success(): void
    {
        $user = User::factory()->create();

        /** @var Authenticatable $user */
        $response = $this->actingAs($user)->get('/material/create');

        $response->assertViewIs('material.create');
    }

    /**
     * Test Post Material As Guest Get Redirect
     *
     * @return void
     */
    public function test_post_material_as_guest(): void
    {
        $response = $this->post('/material/store');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Post Material With Success
     *
     * @return void
     */
    public function test_post_material_with_success(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/material/store', [
            'name' => 'Material One',
            'description' => '',
            'uom' => 'meter',
            'unit_price' => 120000,
            'tag_ids' => '',
        ]);

        $response->assertRedirect('/material');
        $response->assertSessionHas('success', 'Successfully create a material');
    }

    /**
     * Test Post Material With Tags With Success
     *
     * @return void
     */
    public function test_post_material_with_tags_success(): void
    {
        $user = User::factory()->create();

        $tag1 = Tag::factory()->create([
            'user_id' => $user->id
        ]);
        $tag2 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->post('/material/store', [
            'name' => 'Material One',
            'description' => '',
            'uom' => 'meter',
            'unit_price' => 120000,
            'tag_ids' => "$tag1->id,$tag2->id",
        ]);

        $response->assertRedirect('/material');
        $response->assertSessionHas('success', 'Successfully create a material');
    }

    /**
     * Test Show Material As Guest Get Redirected
     *
     * @return void
     */
    public function test_show_material_as_guest(): void
    {
        $response = $this->get('/material/2');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Get Show Material Page But Not Found
     *
     * @return void
     */
    public function test_show_material_not_found(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/material/2');

        $response->assertStatus(404);
    }

    /**
     * Test Get Show Material Page With Success
     *
     * @return void
     */
    public function test_show_material_success(): void
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get("/material/$material->id");

        $response->assertViewIs('material.show');
    }

    /**
     * Test Get Edit Material Page As Guest Get Redirected
     *
     * @return void
     */
    public function test_edit_material_as_guest(): void
    {
        $response = $this->get('/material/2/edit');

        $response->assertRedirect('/user/login');
    }

    /**
     * Get Edit Material Page But Not Found
     *
     * @return void
     */
    public function test_edit_material_not_found(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get("/material/2/edit");

        $response->assertStatus(404);
    }

    /**
     * Test Get Edit Material Page With Success
     *
     * @return void
     */
    public function test_edit_material_success(): void
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get("/material/$material->id/edit");

        $response->assertViewIs('material.edit');
    }

    /**
     * Test Update Material As Guest Get Redirected
     *
     * @return void
     */
    public function test_update_material_as_guest(): void
    {
        $response = $this->put('/material/2/update');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Update Material Not Found
     *
     * @return void
     */
    public function test_update_material_not_found(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->put("/material/2/update");

        $response->assertStatus(404);
    }

    /**
     * Test Update Material With Success
     *
     * @return void
     */
    public function test_update_material_success(): void
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->put("/material/$material->id/update", [
            'name' => 'Material Updated',
            'description' => 'Description Updated',
            'uom' => 'meter',
            'unit_price' => 120000
        ]);

        $response->assertRedirect("material/$material->id");
        $response->assertSessionHas('success', 'Successfully update material');
    }

    /**
     * Test Destroy Material As Guest Get Redirected
     *
     * @return void
     */
    public function test_destroy_material_as_guest(): void
    {
        $response = $this->delete('/material/2/delete');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Destroy Material Not Found
     *
     * @return void
     */
    public function test_destroy_material_not_found(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete('/material/2/delete');

        $response->assertStatus(404);
    }

    /**
     * Test Destroy Material With Success
     *
     * @return void
     */
    public function test_destroy_material_success(): void
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete("material/$material->id/delete");

        $response->assertRedirect('/material');
        $response->assertSessionHas('success', 'Successfully delete material');
    }
}
