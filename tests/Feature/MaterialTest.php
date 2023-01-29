<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Material;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaterialTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseMigrations;

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

    /**
     * Get Create Material As Guest And Get Redirected
     *
     * @return void
     */
    public function test_get_create_material_as_guest()
    {
        $response = $this->get('/material/create');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Get Create Material Page With Success
     *
     * @return void
     */
    public function test_get_create_material_success()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/material/create');

        $response->assertViewIs('material.create');
    }

    /**
     * Test Post Material As Guest Get Redirect
     *
     * @return void
     */
    public function test_post_material_as_guest()
    {
        $response = $this->post('/material/store');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Post Material With Success
     *
     * @return void
     */
    public function test_post_material_with_success()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/material/store', [
            'name' => 'Material One',
            'description' => '',
            'uom' => 'meter',
            'unit_price' => 120000,
        ]);

        $response->assertRedirect('/material');
        $response->assertSessionHas('success', 'Successfully create a material');
    }

    /**
     * Test Show Material As Guest Get Redirected
     *
     * @return void
     */
    public function test_show_material_as_guest()
    {
        $response = $this->get('/material/2');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Get Show Material Page But Not Found
     *
     * @return void
     */
    public function test_show_material_not_found()
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
    public function test_show_material_success()
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
    public function test_edit_material_as_guest()
    {
        $response = $this->get('/material/2/edit');

        $response->assertRedirect('/user/login');
    }

    /**
     * Get Edit Material Page But Not Found
     *
     * @return void
     */
    public function test_edit_material_not_found()
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
    public function test_edit_material_success()
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
    public function test_update_material_as_guest()
    {
        $response = $this->put('/material/2/update');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Update Material Not Found
     *
     * @return void
     */
    public function test_update_material_not_found()
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
    public function test_update_material_success()
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
    public function test_destroy_material_as_guest()
    {
        $response = $this->delete('/material/2/delete');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Destroy Material Not Found
     *
     * @return void
     */
    public function test_destroy_material_not_found()
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
    public function test_destroy_material_success()
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
