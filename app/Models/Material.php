<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * For checking filter has tags or search and append on query
     * @param mixed $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters) 
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
