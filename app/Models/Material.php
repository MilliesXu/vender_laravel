<?php

namespace App\Models;

use Database\Factories\MaterialFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * App\Models\Material
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $uom
 * @property int $unit_price
 * @property int $user_id
 * @property User $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @method static MaterialFactory factory(...$parameters)
 * @method static Builder|Material filter(array $filters)
 * @method static Builder|Material newModelQuery()
 * @method static Builder|Material newQuery()
 * @method static Builder|Material query()
 * @method static Builder|Material whereCreatedAt($value)
 * @method static Builder|Material whereDescription($value)
 * @method static Builder|Material whereId($value)
 * @method static Builder|Material whereName($value)
 * @method static Builder|Material whereUnitPrice($value)
 * @method static Builder|Material whereUom($value)
 * @method static Builder|Material whereUpdatedAt($value)
 * @method static Builder|Material whereUserId($value)
 * @mixin Eloquent
 */
class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'uom', 'unit_price', 'user_id'];

    /**
     * Get owner from material
     *
     * @param
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get Tags From Material
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'material_tags');
    }

    /**
     * Get Tag id From Material
     * @return Collection
     */
    public function tags_id(): Collection
    {
        return $this->tags()->pluck('tags.id');
    }

    /**
     * For checking filter has tags or search and append on query
     * @param mixed $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter(Builder $query, array $filters): void
    {
        if ($filters['tag'] ?? false)
        {
            $query->where('tags', 'like', '%'. $filters['search'] . '%');
        }

        if ($filters['search'] ?? false)
        {
            $query->where('name', 'like', '%'. $filters['search'] . '%')
                ->orWhere('description', 'like', '%'. $filters['search'] . '%')
                ->orWhere('uom', 'like', '%'. $filters['search'] . '%')
                ->orWhere('unit_price', 'like', '%'. $filters['search'] . '%');
        }
    }
}
