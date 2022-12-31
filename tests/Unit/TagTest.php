<?php

namespace Tests\Unit;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TagTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Tag Belongs To User Success
     *
     * @return void
     */
    public function test_tag_user()
    {
        $user = User::factory()->create();

        $tag = Tag::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertEquals(1, $tag->user()->count());
    }

    public function test_tag_filter()
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
