<?php

namespace Tests\Unit;

use App\Models\Material;
use App\Models\MaterialTag;
use App\Models\Tag;
use App\Models\User;
use App\Services\MaterialService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MaterialTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Get User From Material
     * @return void
     */
    public function test_get_user_from_material(): void
    {
        $user = User::factory()->create();

        User::factory(6)->create();

        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $user_result = $material->user();

        $this->assertEquals(1, $user_result->count());
        $this->assertTrue($user_result->first()->is($user));
    }

    /**
     * Test Get All Tags And Tag Ids From Material
     * @return void
     */
    public function test_get_tag_and_tag_ids_from_material(): void
    {
        $user = User::factory()->create();

        $tag1 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $tags = Tag::factory(3)->create([
            'user_id' => $user->id
        ]);

        Tag::factory(7)->create([
            'user_id' => $user->id
        ]);

        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        MaterialTag::factory()->create([
            'material_id' => $material->id,
            'tag_id' => $tag1->id,
            'user_id' => $user->id
        ]);

        /** @var Tag $tag */
        foreach ($tags as $tag) {
            MaterialTag::factory()->create([
                'material_id' => $material->id,
                'tag_id' => $tag->id,
                'user_id' => $user->id
            ]);
        }

        $tags_result = $material->tags();
        $tag_ids_result = $material->tags_id();

        $this->assertEquals(4, $tags_result->count());
        $this->assertTrue($tags_result->first()->is($tag1));
        $this->assertEquals(4, $tag_ids_result->count());
        $this->assertEquals($tag1->id, $tag_ids_result[0]);
    }

    /**
     * Test Material Filter Using Tag Name And Search
     * @return void
     */
    public function test_material_filter_with_tag_and_search(): void
    {
        $user = User::factory()->create();

        $tag1 = Tag::factory()->create([
            'name' => 'Steel',
            'user_id' => $user->id
        ]);

        $tags = Tag::factory(10)->create([
            'user_id' => $user->id
        ]);

        $material1 = Material::factory()->create([
            'name' => 'Material One',
            'user_id' => $user->id
        ]);

        $material2 = Material::factory()->create([
            'name' => 'Material Two',
            'user_id' => $user->id
        ]);

        $materials = Material::factory(10)->create([
            'user_id' => $user->id
        ]);

        MaterialTag::factory()->create([
            'material_id' => $material1->id,
            'tag_id' => $tag1->id,
            'user_id' => $user->id
        ]);

        MaterialTag::factory()->create([
            'material_id' => $material2->id,
            'tag_id' => $tag1->id,
            'user_id' => $user->id
        ]);

        /** @var Material $material */
        foreach ($materials as $material) {
            /** @var Tag $tag */
            foreach ($tags as $tag) {
                MaterialTag::factory()->create([
                    'material_id' => $material->id,
                    'tag_id' => $tag->id,
                    'user_id' => $user->id
                ]);
            }
        }

        /** @var Tag $tag */
        foreach ($tags as $tag) {
            MaterialTag::factory()->create([
                'material_id' => $material1->id,
                'tag_id' => $tag->id,
                'user_id' => $user->id
            ]);

            MaterialTag::factory()->create([
                'material_id' => $material2->id,
                'tag_id' => $tag->id,
                'user_id' => $user->id
            ]);
        }

        $material_service = new MaterialService();

        $result = $material_service->index(['tag' => 'Steel', 'search' => 'Material']);

        $this->assertEquals(2, $result->count());
        $this->assertEquals($material1->id, $result[0]->id);
        $this->assertEquals($material2->id, $result[1]->id);
    }
}
