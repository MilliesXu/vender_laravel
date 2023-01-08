<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\User;
use App\Models\Material;
use App\Models\MaterialTag;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaterialTagTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Get User From MaterialTag
     *
     * @return void
     */
    public function test_material_tags_user()
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

        $this->assertEquals(1, $materialTag->user()->count());
        $this->assertTrue($materialTag->user()->first()->is($user));
    }
}
