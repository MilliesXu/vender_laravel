<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Index Tag Without Authentification Get Redirected.
     *
     * @return void
     */
    public function test_get_index_tag_without_authentification()
    {
        $response = $this->get('/tag');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Get Index Tag Success
     *
     * @return void
     */
    public function test_get_index_tag_with_sucess()
    {
        $user = User::factory()->create();

         /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/tag');

        $response->assertViewIs('tag.index');
    }

    /**
     * Test Get Create Tag View Without Authentification Get Redirected
     *
     * @return void
     */
    public function test_get_create_tag_view_without_authentification()
    {
        $response = $this->get('/tag/create');

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Get Create Tag View Success
     *
     * @return void
     */
    public function test_get_create_tag_view_success()
    {
        $user = User::factory()->create();

         /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get('/tag/create');

        $response->assertViewIs('tag.create');
    }

    /**
     * Test Post Tag Without Authentification Get Redirec
     *
     * @return void
     */
    public function test_post_tag_without_authentification()
    {
        $response = $this->post('/tag/store', [
            'name' => 'window',
        ]);

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Post Tag With Name Existed Get Invalid Error
     *
     * @return void
     */
    public function test_post_tag_name_error()
    {
        $user = User::factory()->create();

        Tag::factory()->create([
            'name' => 'window',
            'user_id' => $user->id,
        ]);

         /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->post('/tag/store', [
            'name' => 'window',
        ]);

        $response->assertInvalid('name');
    }

    /**
     * Test Post Tag With Success
     *
     * @return void
     */
    public function test_post_tag_success()
    {
        $user = User::factory()->create();

         /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
         $response = $this->actingAs($user)->post('/tag/store', [
            'name' => 'window',
        ]);

        $response->assertRedirect('/tag');
        $response->assertSessionHas('success', 'Successfully create a tag');
    }

    /**
     * Test Show Tag Page Without Authentification Get Redirect
     *
     * @return void
     */
    public function test_show_tag_without_authentification()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->get("/tag/$tag->id");

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Show Tag Page But Tag Not Found
     *
     * @return void
     */
    public function test_show_tag_not_found()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get("/tag/1");

        $response->assertStatus(404);
    }

    /**
     * Test Show Tag Page Success
     *
     * @return void
     */
    public function test_show_tag_with_success()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get("/tag/$tag->id");

        $response->assertViewIs('tag.show');
    }

    /**
     * Test Edit Page Without Authentification Get Redirect
     *
     * @return void
     */
    public function test_edit_tag_without_authentification()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->get("/tag/$tag->id/edit");

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Edit Page Not Found
     *
     * @return void
     */
    public function test_edit_tag_not_found()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get("/tag/1");

        $response->assertStatus(404);

    }

    /**
     * Test Edit Page With Success
     *
     * @return void
     */
    public function test_edit_tag_success()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->get("/tag/$tag->id/edit");

        $response->assertViewIs('tag.edit');
    }

    /**
     * Update Tag Without Authorization Get Redirected
     *
     * @return void
     */
    public function test_update_tag_without_authorization()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->put("/tag/$tag->id/update", [
            'name' => 'Door'
        ]);

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Update Tag But Not Found
     *
     * @return void
     */
    public function test_update_tag_not_found()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->put("/tag/1/update", [
            'name' => 'Door'
        ]);

        $response->assertStatus(404);
    }

    /**
     * Test Update Tag Name Invalid
     *
     * @return void
     */
    public function test_update_tag_name_invalid()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        Tag::factory()->create([
            'name' => 'Door',
            'user_id' => $user->id
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->put("/tag/$tag->id/update", [
            'name' => 'Door'
        ]);

        $response->assertInvalid('name');
    }

    /**
     * Test Update Tag With Success
     *
     * @return void
     */
    public function test_update_tag_success()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->put("/tag/$tag->id/update", [
            'name' => 'Door'
        ]);

        $response->assertRedirect("tag/$tag->id");
        $response->assertSessionHas('success', 'Successfully updated tag');
    }
    
    /**
     * Test Delete Tag Without Authorization Get Redirected
     *
     * @return void
     */
    public function test_delete_tag_without_authorization()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->delete("/tag/$tag->id/delete");

        $response->assertRedirect('/user/login');
    }

    /**
     * Test Delete Tag But Not Found
     *
     * @return void
     */
    public function test_delete_tag_not_found()
    {
        $user = User::factory()->create();

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->delete("/tag/1/delete");

        $response->assertStatus(404);
    }

    public function test_delete_tag_success()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var \Illuminate\Contracts\Auth\Authenticatable $user */
        $response = $this->actingAs($user)->delete("/tag/$tag->id/delete");

        $response->assertRedirect('/tag');
        $response->assertSessionHas('success', 'Successfully delete a tag');
    }
}
