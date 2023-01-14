<?php

namespace App\Services;

use App\Models\Material;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\Cast\Bool_;

class MaterialService
{
    /**
     * Get Index Of Materials By Filter Or Not
     *
     * @param array $filter
     * @return Collection
     */
    public function index(array $filter): Collection
    {
        return Material::latest()->filter($filter)->get();
    }

    /**
     * Create Material From Controller
     *
     * @param array $formfields
     * @return Material
     */
    public function store(array $formfields): Material
    {
        return Material::create($formfields);
    }

    /**
     * Update Material From Controller
     *
     * @param Material $material
     * @param array $formfields
     * @return Bool
     */
    public function update(Material $material, array $formfields): Bool
    {
        return $material->update($formfields);
    }

    /**
     * Delete Material From Controller
     *
     * @param Material $material
     * @return Bool
     */
    public function destroy(Material $material): Bool
    {
        return $material->delete();
    }
}
