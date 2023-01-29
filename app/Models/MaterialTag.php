<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $material_id
 * @property int $tag_id
 * @property int $user_id
 * @property User $user
 * @method static create(array $array)
 */
class MaterialTag extends Model
{
    use HasFactory;

    protected $fillable = ['material_id', 'tag_id', 'user_id'];

    /**
     * Return User from MaterialTag
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Material From MaterialTag
     * @return BelongsTo
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    /**
     * Get Tag From MaterialTag
     * @return BelongsTo
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

}
