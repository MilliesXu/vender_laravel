<?php

namespace App\Models;

use Database\Factories\MaterialTagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\MaterialTag
 *
 * @property int $id
 * @property int $material_id
 * @property int $tag_id
 * @property int $user_id
 * @property User $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Material $material
 * @property-read Tag $tag
 * @method static MaterialTagFactory factory(...$parameters)
 * @method static Builder|MaterialTag newModelQuery()
 * @method static Builder|MaterialTag newQuery()
 * @method static Builder|MaterialTag query()
 * @method static Builder|MaterialTag whereCreatedAt($value)
 * @method static Builder|MaterialTag whereId($value)
 * @method static Builder|MaterialTag whereMaterialId($value)
 * @method static Builder|MaterialTag whereTagId($value)
 * @method static Builder|MaterialTag whereUpdatedAt($value)
 * @method static Builder|MaterialTag whereUserId($value)
 * @mixin Eloquent
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
