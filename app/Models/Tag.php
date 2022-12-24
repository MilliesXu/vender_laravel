<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * For checking filter has tags or search and append on query
     * @param mixed $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters) 
    {
        if ($filters['search'] ?? false) 
        {
            $query->where('name', 'like', '%'. request('search') . '%');
        }
    }

    /**
     * Show All Tags
     *
     * @param array $filter
     * @return Collection
     */
    public static function index(array $filter): Collection 
    {
        return self::latest()->filter($filter)->get();
    }

    /**
     * Create New Tag
     *
     * @param array $formfields
     * @return void
     */
    public static function store(array $formfields)
    {
        return self::create($formfields);
    }
}
