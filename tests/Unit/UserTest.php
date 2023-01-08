<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\User;
use App\Models\Material;
use App\Models\MaterialTag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test User Materials Relationship.
     *
     * @return void
     */
    public function test_user_materials_relationship()
    {
        $user = User::factory()->create();

        Material::factory(10)->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals(10, $user->materials()->count());
    }

    /**
     * Test User Tags Relationship
     *
     * @return void
     */
    public function test_user_tags_relationship()
    {
        $user = User::factory()->create();

        Tag::factory(10)->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals(10, $user->tags()->count());
    }

    /**
     * Test Get Material Tags From User
     *
     * @return void
     */
    public function test_user_material_tags()
    {
        $user = User::factory()->create();


        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $materialTag = MaterialTag::factory()->create([
            'material_id' => $material->id,
            'tag_id' => $tag->id,
            'user_id' => $user->id
        ]);

        MaterialTag::factory(5)->create([
            'material_id' => $material->id,
            'tag_id' => $tag->id,
            'user_id' => $user->id
        ]);

        $this->assertEquals(6, $user->material_tags()->count());
        $this->assertTrue($user->material_tags()->first()->is($materialTag));
    }
}
