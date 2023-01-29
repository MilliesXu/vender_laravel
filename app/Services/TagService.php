<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagService
{
    /**
     * To Get All Tags Filtered
     *
     * @param array $filter
     * @return Collection
     */
    public function index(array $filter): Collection
    {
        return Tag::filter($filter)->get();
    }

    /**
     * To Create New Tag From Controller
     *
     * @param array $formfields
     * @return Tag
     */
    public function store(array $formfields): Tag
    {
        return Tag::create($formfields);
    }

    /**
     * To Update A Tag From Controller
     *
     * @param Tag $tag
     * @param array $formfields
     * @return boolean
     */
    public function update(Tag $tag, array $formfields): bool
    {
        return $tag->update($formfields);
    }

    /**
     * To Delete A Tag From Controller
     *
     * @param Tag $tag
     * @return bool
     */
    public function delete(Tag $tag): bool
    {
        return $tag->delete();
    }
}
