<?php

namespace Unit;

use App\Models\Tag;
use App\Models\User;
use App\Services\TagService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TagServiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Index Tag Success
     *
     * @return void
     */
    public function test_index_success(): void
    {
        $tag_service = new TagService();

        $user = User::factory()->create();

        Tag::factory()->create([
            'name' => 'window',
            'user_id' => $user->id,
        ]);

        Tag::factory(5)->create([
            'user_id' => $user->id,
        ]);

        $tags = $tag_service->index([]);

        $this->assertEquals(6, $tags->count());
    }

    /**
     * Test Index Tag With Filter
     *
     * @return void
     */
    public function test_index_with_filter_success(): void
    {
        $tag_service = new TagService();

        $user = User::factory()->create();

        Tag::factory()->create([
            'name' => 'window',
            'user_id' => $user->id,
        ]);

        Tag::factory(5)->create([
            'user_id' => $user->id,
        ]);

        $tags = $tag_service->index(['search' => 'window']);

        $this->assertEquals(1, $tags->count());
        $this->assertEquals('window', $tags[0]->name);
    }

    /**
     * Test Store Tag Success
     *
     * @return void
     */
    public function test_store_success(): void
    {
        $tag_service = new TagService();

        $user = User::factory()->create();

        $tag = $tag_service->store([
            'name' => 'door',
            'user_id' => $user->id,
        ]);

        $this->assertEquals('door', $tag->name);
    }

    /**
     * Test Update Tag With Success
     *
     * @return void
     */
    public function test_update_success(): void
    {
        $tag_service = new TagService();

        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'name' => 'window',
            'user_id' => $user->id
        ]);

        Tag::factory()->create([
            'name' => 'door',
            'user_id' => $user->id,
        ]);

        $result = $tag_service->update($tag, [
            'name' => 'black'
        ]);

        $this->assertTrue($result);
    }

    /**
     * Test Delete Tag Successfully
     *
     * @return void
     */
    public function test_delete_tag_success(): void
    {
        $tag_service = new TagService();

        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'name' => 'window',
            'user_id' => $user->id
        ]);

        $result = $tag_service->delete($tag);

        $this->assertTrue($result);
    }
}
