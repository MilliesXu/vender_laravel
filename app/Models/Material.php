<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * For checking filter has tags or search and append on query
     * @param mixed $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters) 
    {
        if ($filters['tag'] ?? false) 
        {
            $query->where('tags', 'like', '%'. request('tag') . '%');
        }

        if ($filters['search'] ?? false) 
        {
            $query->where('name', 'like', '%'. request('search') . '%')
                ->orWhere('description', 'like', '%'. request('search') . '%')
                ->orWhere('uom', 'like', '%'. request('search') . '%')
                ->orWhere('unit_price', 'like', '%'. request('search') . '%');
        }
    }

    /**
     * Get all materials with or without filter
     * 
     * @param array $filters
     * @return Collection
     */
    public static function index(array $filters): Collection 
    {
        return self::latest()->filter($filters)->get();
    }

    /**
     * Create material
     * 
     * @param array $formfields
     * @return void
     */
    public static function store(array $formfields) 
    {
        return self::create($formfields);
    }
}
