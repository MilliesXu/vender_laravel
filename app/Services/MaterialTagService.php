<?php

namespace App\Services;

use App\Models\Material;
use App\Models\MaterialTag;
use App\Models\Tag;
use App\Models\User;

/**
 *
 */
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
     * Delete Material Tag
     * @param Material $material
     * @param Tag $tag
     * @return bool
     */
    public function delete(Material $material, Tag $tag): bool
    {
        return MaterialTag::query()->where('material_id', '=', $material->id)->where('tag_id', '=', $tag->id)->delete();
    }
}
