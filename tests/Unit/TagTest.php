<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\User;
use App\Models\Material;
use App\Models\MaterialTag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TagTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Tag Belongs To User Success
     *
     * @return void
     */
    public function test_tag_user(): void
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals(1, $tag->user()->count());
        $this->assertTrue($tag->user()->first()->is($user));
    }

    /**
     * Test Get Materials From Tag
     *
     * @return void
     */
    public function test_tag_materials(): void
    {
        $user = User::factory()->create();

        $material1 = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $material2 = Material::factory()->create([
            'user_id' => $user->id
        ]);


        Material::factory()->create([
            'user_id' => $user->id
        ]);

        $tag = Tag::factory()->create([
            'user_id' => $user->id
        ]);

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

        $materials = $tag->materials();

        $this->assertEquals(2, $materials->count());
        $this->assertTrue($materials->first()->is($material1));
    }

    /**
     * Test Tag Filter By Search
     *
     * @return void
     */
    public function test_tag_filter(): void
    {
        $user = User::factory()->create();

        Tag::factory()->create([
            'name' => 'window',
            'user_id' => $user->id,
        ]);

        Tag::factory(5)->create([
            'user_id' => $user->id,
        ]);

        $tags = Tag::filter(['search' => 'window'])->get();

        $this->assertEquals(1, $tags->count());
        $this->assertEquals('window', $tags[0]->name);
    }
}
