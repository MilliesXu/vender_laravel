<?php

namespace Tests\Unit;

use App\Models\Material;
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
    public function test_material_user()
    {
        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertEquals(1, $material->user()->count());
        $this->assertTrue($material->user()->first()->is($user));
    }

    /**
     * Test Material Filter By Search
     *
     * @return void
     */
    public function test_material_filter()
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
