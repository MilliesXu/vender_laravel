<?php

namespace Tests\Unit;

use App\Models\Material;
use App\Models\User;
use App\Services\MaterialService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MaterialServiceTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * Test Index Material With Success.
     *
     * @return void
     */
    public function test_index_with_success(): void
    {
        $material_service = new MaterialService();

        $user = User::factory()->create();

        Material::factory(6)->create([
            'user_id' => $user->id,
        ]);

        $materials = $material_service->index([]);

        $this->assertEquals(6, $materials->count());
    }

    /**
     * Test Index Materials With Filter And Success
     *
     * @return void
     */
    public function test_index_with_filter_success(): void
    {
        $material_service = new MaterialService();

        $user = User::factory()->create();

        $material = Material::factory()->create([
            'name' => 'Aluminium Black',
            'user_id' => $user->id,
        ]);

        Material::factory(5)->create([
            'user_id' => $user->id,
        ]);

        $materials = $material_service->index([
            'search' => 'black'
        ]);

        $this->assertEquals(1, $materials->count());
        $this->assertEquals($material->id, $materials[0]->id);
    }

    /**
     * Test Store Material With Success
     *
     * @return void
     */
    public function test_store_success(): void
    {
        $material_service = new MaterialService();

        $user = User::factory()->create();

        $material = $material_service->store([
            'name' => 'Aluminium Black',
            'description' => 'This is aluminium black',
            'uom' => 'meter',
            'unit_price' => 120000,
            'user_id' => $user->id
        ]);

        $this->assertEquals('Aluminium Black', $material->name);
    }

    /**
     * Test Update Material Success
     *
     * @return void
     */
    public function test_update_success(): void
    {
        $material_service = new MaterialService();

        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id,
        ]);

        $result = $material_service->update($material, [
            'name' => 'Aluminium Black',
            'description' => 'This is aluminium black',
            'uom' => 'meter',
            'unit_price' => 120000,
        ]);

        $this->assertTrue($result);
        $this->assertEquals('Aluminium Black', $material->name);
        $this->assertEquals('This is aluminium black', $material->description);
        $this->assertEquals('meter', $material->uom);
        $this->assertEquals(120000, $material->unit_price);
    }

    /**
     * Test Delete Material Success
     *
     * @return void
     */
    public function test_destroy_success(): void
    {
        $material_service = new MaterialService();

        $user = User::factory()->create();

        $material = Material::factory()->create([
            'user_id' => $user->id,
        ]);

        $result = $material_service->destroy($material);

        $this->assertTrue($result);
    }
}
