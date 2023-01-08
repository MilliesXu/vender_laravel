<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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
    public function scopeFilter($query, array $filters) 
    {
        if ($filters['search'] ?? false) 
        {
            $query->where('name', 'like', '%'. $filters['search'] . '%');
        }
    }
}
