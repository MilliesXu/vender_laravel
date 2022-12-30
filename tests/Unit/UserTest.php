<?php

namespace Tests\Unit;

use App\Models\Material;
use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
}
