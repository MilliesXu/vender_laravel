<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property User $user
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Material[] $materials
 * @property-read int|null $materials_count
 * @method static TagFactory factory(...$parameters)
 * @method static Builder|Tag filter(array $filters)
 * @method static Builder|Tag newModelQuery()
 * @method static Builder|Tag newQuery()
 * @method static Builder|Tag query()
 * @method static Builder|Tag whereCreatedAt($value)
 * @method static Builder|Tag whereId($value)
 * @method static Builder|Tag whereName($value)
 * @method static Builder|Tag whereUpdatedAt($value)
 * @method static Builder|Tag whereUserId($value)
 * @mixin Eloquent
 */
class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    /**
     * Get user from tags
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get Materials From Tags
     *
     * @return BelongsToMany
     */
    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(Material::class, 'material_tags');
    }

    /**
     * For checking filter has tags or search and append on query
     * @param mixed $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter(Builder $query, array $filters): void
    {
        if ($filters['search'] ?? false)
        {
            $query->where('name', 'like', '%'. $filters['search'] . '%');
        }

        if ($filters['not_include'] ?? false)
        {
            $query->whereNotIn('id', $filters['not_include']);
        }
    }
}
