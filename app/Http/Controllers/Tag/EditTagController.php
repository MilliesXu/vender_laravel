<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditTagController extends Controller
{
    /**
     * Show Edit Tag Page
     *
     * @param Tag $tag
     * @return View
     */
    public function __invoke(Tag $tag): View
    {
        return view('tag.edit', [
            'tag' => $tag,
        ]);
    }
}
