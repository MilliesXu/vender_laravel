<?php

namespace Unit;

use App\Models\Material;
use App\Models\MaterialTag;
use App\Models\Tag;
use App\Models\User;
use App\Services\MaterialService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \Tests\TestCase;

class MaterialTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Material Relationship With User.
     *
     * @return void
     */
    public function test_material_user(): void
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertEquals(1, $material->user()->count());
        $this->assertTrue($material->user()->first()->is($user));
    }

    public function test_material_tags(): void
    {
        $user = User::factory()->create();

        $tag1 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $tag2 = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        Tag::factory(3)->create([
            'user_id' => $user->id
        ]);

        $material = Material::factory()->create([
            'user_id' => $user->id,
        ]);

        MaterialTag::factory()->create([
            'material_id' => $material->id,
            'tag_id' => $tag1->id,
            'user_id' => $user->id
        ]);

        MaterialTag::factory()->create([
            'material_id' => $material->id,
            'tag_id' => $tag2->id,
            'user_id' => $user->id
        ]);

        $this->assertEquals(2, $material->tags()->count());
        $this->assertTrue($material->tags()->first()->is($tag1));
    }

    /**
     * Test Material Filter By Search
     *
     * @return void
     */
    public function test_material_filter(): void
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'name' => 'Aluminium Black',
            'user_id' => $user->id
        ]);

        Material::factory(5)->create([
            'user_id' => $user->id,
        ]);

        $material_service = new MaterialService();

        $materials = $material_service->index(['search' => 'aluminium']);

        $this->assertEquals(1, $materials->count());
        $this->assertEquals($material->id, $materials[0]->id);
    }
}
