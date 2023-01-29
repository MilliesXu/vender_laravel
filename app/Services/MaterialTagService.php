<?php

namespace App\Services;

use App\Models\Material;
use App\Models\MaterialTag;
use App\Models\User;

class MaterialTagService
{

    /**
     * Create A Material Tag
     * @param int $tag_id
     * @param Material $material
     * @param User $user
     * @return MaterialTag
     */
    public function store(int $tag_id, Material $material, User $user): MaterialTag
    {
        return MaterialTag::create([
            'tag_id' => $tag_id,
            'material_id' => $material->id,
            'user_id' => $user->id,
        ]);
    }


    /**
     * Delete A MaterialTag
     * @param MaterialTag $material_tag
     * @return bool
     */
    public function delete(MaterialTag $material_tag): bool
    {
        return $material_tag->delete();
    }
}
