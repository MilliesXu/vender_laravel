<?php

namespace Tests\Unit;

use App\Models\Material;
use App\Models\MaterialTag;
use App\Models\Tag;
use App\Models\User;
use App\Services\MaterialTagService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MaterialTagServiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_store_material_tag(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Tag $tag */
        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var Material $material */
        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $material_tag_service = new MaterialTagService();

        $material_tag = $material_tag_service->store($tag->id, $material, $user);

        $this->assertEquals($tag->id, $material_tag->tag_id);
        $this->assertEquals($material->id, $material_tag->material_id);
        $this->assertEquals($user->id, $material_tag->user_id);
    }

    public function test_delete_material_tag(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        /** @var Tag $tag */
        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        /** @var Material $material */
        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $material_tag = MaterialTag::factory()->create([
            'material_id' => $material->id,
            'tag_id' => $tag->id,
            'user_id' => $user->id
        ]);

        $material_tag_service = new MaterialTagService();

        $result = $material_tag_service->delete($material, $tag);

        $this->assertEquals(true, $result);
    }
}
